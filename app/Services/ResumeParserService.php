<?php
// app/Services/ResumeParserService.php

namespace App\Services;

use Smalot\PdfParser\Parser as PdfParser;
use PhpOffice\PhpWord\IOFactory as WordFactory;
use Illuminate\Support\Facades\Log;

class ResumeParserService
{
    private $extractedData = [];
    private $rawText = '';
    
    public function parse($filePath)
    {
        $this->extractedData = [];
        $this->rawText = $this->extractText($filePath);
        
        if (empty($this->rawText)) {
            return $this->getEmptyData();
        }
        
        // Extract ALL fields
        $this->extractBasicDetails();
        $this->extractContactInfo();
        $this->extractJobPreference();
        $this->extractLocationAndSalary();
        $this->extractSkillsAndLanguages();
        $this->extractEducation();
        $this->extractWorkExperience();
        $this->extractAvailability();
        
        return $this->extractedData;
    }
    
    private function extractText($filePath)
    {
        $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
        $text = '';
        
        try {
            switch ($extension) {
                case 'pdf':
                    $parser = new PdfParser();
                    $pdf = $parser->parseFile($filePath);
                    $text = $pdf->getText();
                    break;
                case 'doc':
                case 'docx':
                    $phpWord = WordFactory::load($filePath);
                    foreach ($phpWord->getSections() as $section) {
                        $text .= $this->extractWordText($section->getElements());
                    }
                    break;
                case 'txt':
                    $text = file_get_contents($filePath);
                    break;
            }
            
            $text = preg_replace('/\s+/', ' ', $text);
            return trim($text);
            
        } catch (\Exception $e) {
            Log::error('Text extraction failed: ' . $e->getMessage());
            return '';
        }
    }
    
    private function extractWordText($elements)
    {
        $text = '';
        foreach ($elements as $element) {
            if (method_exists($element, 'getText')) {
                $text .= $element->getText() . "\n";
            }
            if (method_exists($element, 'getElements')) {
                $text .= $this->extractWordText($element->getElements());
            }
        }
        return $text;
    }
    
    private function extractBasicDetails()
    {
        // Full Name
        $lines = explode('.', $this->rawText, 5);
        $firstLines = implode(' ', array_slice($lines, 0, 3));
        
        if (preg_match('/^([A-Z][a-z]+(?:\s+[A-Z][a-z]+){1,3})/', $firstLines, $match)) {
            $this->extractedData['full_name'] = trim($match[1]);
        } else {
            foreach (explode("\n", $this->rawText) as $line) {
                $line = trim($line);
                if (preg_match('/^[A-Z][a-z]+\s+[A-Z][a-z]+/', $line) && strlen($line) < 50) {
                    $this->extractedData['full_name'] = $line;
                    break;
                }
            }
        }
        
        // Age
        if (preg_match('/\bAge[:\s]+(\d{1,3})\b/i', $this->rawText, $match)) {
            $age = (int)$match[1];
            if ($age >= 18 && $age <= 100) {
                $this->extractedData['age'] = $age;
            }
        } elseif (preg_match('/\b(\d{1,2})\s+years?\s+old\b/i', $this->rawText, $match)) {
            $age = (int)$match[1];
            if ($age >= 18 && $age <= 100) {
                $this->extractedData['age'] = $age;
            }
        }
        
        // Gender
        if (preg_match('/\b(Male|Female|M|F)\b/i', $this->rawText, $match)) {
            $gender = strtolower($match[1]);
            if ($gender == 'm') $gender = 'male';
            if ($gender == 'f') $gender = 'female';
            if (in_array($gender, ['male', 'female', 'other'])) {
                $this->extractedData['gender'] = $gender;
            }
        }
    }
    
    private function extractContactInfo()
    {
        // Email
        preg_match('/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/', $this->rawText, $match);
        $this->extractedData['email'] = $match[0] ?? '';
        
        // Phone (for reference)
        preg_match('/(\+?\d{1,3}[-.\s]?)?\(?\d{3}\)?[-.\s]?\d{3}[-.\s]?\d{4}/', $this->rawText, $match);
        $this->extractedData['phone'] = $match[0] ?? '';
    }
    
    private function extractJobPreference()
    {
        // Position/Job Title
        $jobPatterns = [
            '/([A-Z][a-z]+(?:\s+[A-Z][a-z]+)*\s+(?:Engineer|Developer|Manager|Lead|Head|Director|Consultant|Analyst|Designer|Architect|Specialist))/i',
            '/\b(?:Position|Title|Role)[:\s]+([^,\n]+)/i'
        ];
        
        foreach ($jobPatterns as $pattern) {
            if (preg_match($pattern, $this->rawText, $match)) {
                $this->extractedData['job_title'] = trim($match[1]);
                break;
            }
        }
        
        // Experience Type & Years
        $totalYears = $this->calculateTotalExperience();
        $this->extractedData['total_experience_years'] = $totalYears;
        $this->extractedData['experience_type'] = $totalYears > 0 ? 'experienced' : 'fresher';
        $this->extractedData['exp_years'] = floor($totalYears);
        $this->extractedData['exp_months'] = round(($totalYears - floor($totalYears)) * 12);
        
        // Also check for explicit mention
        if (preg_match('/(\d+)\+?\s*(?:years|yrs)(?:\s+of)?\s*(?:experience|exp)/i', $this->rawText, $match)) {
            $this->extractedData['exp_years'] = (int)$match[1];
            $this->extractedData['experience_type'] = 'experienced';
        }
    }
    
    private function extractLocationAndSalary()
    {
        // Preferred Locations (extract any city-like words)
        $locations = [];
        $cityPattern = '/\b([A-Z][a-z]{3,}(?:\s+[A-Z][a-z]{3,})?)\b/';
        preg_match_all($cityPattern, $this->rawText, $matches);
        
        $commonCities = [
            'Mumbai', 'Delhi', 'Bangalore', 'Hyderabad', 'Chennai', 'Kolkata', 'Pune', 'Ahmedabad',
            'Jaipur', 'Lucknow', 'Nagpur', 'Indore', 'Bhopal', 'Surat', 'Vadodara', 'Rajkot'
        ];
        
        foreach ($matches[1] ?? [] as $word) {
            if (in_array($word, $commonCities) && !in_array($word, $locations)) {
                $locations[] = $word;
            }
        }
        
        // Also look for location indicators
        if (preg_match('/(?:location|city|based in|relocate to)[:\s]+([^.,\n]+)/i', $this->rawText, $match)) {
            $cities = explode(',', $match[1]);
            foreach ($cities as $city) {
                $city = trim($city);
                if (strlen($city) > 2 && !in_array($city, $locations)) {
                    $locations[] = $city;
                }
            }
        }
        
        $this->extractedData['preferred_locations'] = array_slice(array_unique($locations), 0, 10);
        
        // Employment Type
        $employmentTypes = [
            'full_time' => ['full time', 'full-time', 'fulltime', 'permanent'],
            'part_time' => ['part time', 'part-time', 'parttime'],
            'contract' => ['contract', 'contractual'],
            'freelancer' => ['freelance', 'freelancer']
        ];
        
        $foundType = 'full_time';
        foreach ($employmentTypes as $type => $keywords) {
            foreach ($keywords as $keyword) {
                if (preg_match('/\b' . preg_quote($keyword, '/') . '\b/i', $this->rawText)) {
                    $foundType = $type;
                    break 2;
                }
            }
        }
        $this->extractedData['employment_type'] = $foundType;
        
        // Current Salary
        if (preg_match('/(?:Current|Present)\s+Salary[:\s]+[₹$]?\s*(\d+(?:[\d,.]*)?)/i', $this->rawText, $match)) {
            $this->extractedData['current_salary'] = (float)preg_replace('/[^0-9.]/', '', $match[1]);
        }
        
        // Expected Salary
        if (preg_match('/(?:Expected|Desired)\s+Salary[:\s]+[₹$]?\s*(\d+(?:[\d,.]*)?)/i', $this->rawText, $match)) {
            $this->extractedData['expected_salary'] = (float)preg_replace('/[^0-9.]/', '', $match[1]);
        }
    }
    
    private function extractSkillsAndLanguages()
    {
        // Skills - Extract from skills section or bullet points
        $skills = [];
        
        // Look for skills section
        if (preg_match('/(?:Skills|Technical Skills|Core Competencies):?(.*?)(?=\n\s*\n|\n\s*[A-Z]|$)/is', $this->rawText, $section)) {
            $skillText = $section[1];
            $skillWords = preg_split('/[,;•∙▪\n|]+/', $skillText);
            foreach ($skillWords as $skill) {
                $skill = trim($skill);
                if (strlen($skill) >= 2 && strlen($skill) <= 40 && !is_numeric($skill)) {
                    $skills[] = ucwords(strtolower($skill));
                }
            }
        }
        
        // Also look for technology patterns
        $techPatterns = ['/PHP/i', '/Laravel/i', '/JavaScript/i', '/React/i', '/Vue/i', '/Python/i', '/Java/i', '/MySQL/i', '/MongoDB/i', '/Docker/i', '/AWS/i'];
        foreach ($techPatterns as $pattern) {
            if (preg_match($pattern, $this->rawText)) {
                $tech = trim($pattern, '/');
                if (!in_array($tech, $skills)) {
                    $skills[] = $tech;
                }
            }
        }
        
        $this->extractedData['skills'] = array_slice(array_unique($skills), 0, 10);
        
        // Languages
        $languages = [];
        $commonLanguages = ['English', 'Hindi', 'Gujarati', 'Marathi', 'Tamil', 'Telugu', 'Bengali', 'Punjabi'];
        
        foreach ($commonLanguages as $lang) {
            if (preg_match('/\b' . preg_quote($lang, '/') . '\b/i', $this->rawText)) {
                $languages[] = $lang;
            }
        }
        
        $this->extractedData['languages'] = $languages;
    }
    
    private function extractEducation()
    {
        $educations = [];
        $eduSection = $this->extractSection(['Education', 'Academic Background']);
        
        if ($eduSection) {
            $levels = [
                'PhD' => 'PhD/Doctorate',
                'Master' => "Master's Degree",
                'Bachelor' => "Bachelor's Degree",
                'Diploma' => 'Diploma',
                'ITI' => 'ITI',
                '12th' => '12th',
                '10th' => '10th'
            ];
            
            foreach ($levels as $keyword => $level) {
                if (preg_match('/' . preg_quote($keyword, '/') . '\s+(?:in\s+)?([^,\n]+)/i', $eduSection, $match)) {
                    $educations[] = [
                        'level' => $level,
                        'degree' => $keyword,
                        'institution' => $this->extractInstitution($match[0]),
                        'specialization' => trim($match[1] ?? '')
                    ];
                    
                    // Set highest education level
                    if (!isset($this->extractedData['education_level'])) {
                        $this->extractedData['education_level'] = $level;
                    }
                    break;
                }
            }
        }
        
        $this->extractedData['education'] = $educations;
        if (empty($this->extractedData['education_level'])) {
            $this->extractedData['education_level'] = "Bachelor's Degree";
        }
    }
    
    private function extractWorkExperience()
    {
        $experiences = [];
        $workSection = $this->extractSection(['Work Experience', 'Professional Experience', 'Employment History']);
        
        if ($workSection) {
            $blocks = preg_split('/\n\s*\n/', $workSection);
            
            foreach ($blocks as $block) {
                if (empty(trim($block))) continue;
                
                $exp = [];
                
                // Company name
                if (preg_match('/^([A-Z][a-z]+(?:\s+[A-Z][a-z]+)*\s*(?:Technologies|Solutions|Corp|Inc|Ltd)?)/', $block, $match)) {
                    $exp['company_name'] = trim($match[1]);
                }
                
                // Position
                if (preg_match('/([A-Z][a-z]+(?:\s+[A-Z][a-z]+)*\s+(?:Engineer|Developer|Manager|Lead))/i', $block, $match)) {
                    $exp['position'] = trim($match[1]);
                }
                
                // Dates
                if (preg_match('/(\d{4})\s*[-–]\s*(\d{4}|Present|Current)/i', $block, $match)) {
                    $exp['start_date'] = $match[1] . '-01-01';
                    $exp['currently_working'] = preg_match('/Present|Current/i', $match[2]);
                    if (!$exp['currently_working']) {
                        $exp['end_date'] = $match[2] . '-12-31';
                    }
                }
                
                if (!empty($exp['company_name']) || !empty($exp['position'])) {
                    $experiences[] = $exp;
                }
            }
        }
        
        $this->extractedData['work_experience'] = $experiences;
        
        // Current position and company
        if (!empty($experiences[0])) {
            $this->extractedData['current_position'] = $experiences[0]['position'] ?? '';
            $this->extractedData['current_company'] = $experiences[0]['company_name'] ?? '';
        }
    }
    
    private function extractAvailability()
    {
        if (preg_match('/\b(immediate|immediately|asap)\b/i', $this->rawText)) {
            $this->extractedData['availability'] = 'immediately';
        } elseif (preg_match('/\b(within\s+7\s+days|one\s+week)\b/i', $this->rawText)) {
            $this->extractedData['availability'] = 'within_7_days';
        } elseif (preg_match('/(?:notice period|joining)[:\s]+(\d+)\s*(?:days|day)/i', $this->rawText, $match)) {
            $days = (int)$match[1];
            $this->extractedData['availability'] = $days == 0 ? 'immediately' : 'within_7_days';
        } else {
            $this->extractedData['availability'] = 'flexible';
        }
    }
    
    private function extractSection($sectionNames)
    {
        foreach ((array)$sectionNames as $sectionName) {
            $pattern = '/\b' . preg_quote($sectionName, '/') . '\b[:\s]*(.*?)(?=\n\s*[A-Z][a-z]+[:\s]|\n\s*\n\s*[A-Z]|$)/is';
            if (preg_match($pattern, $this->rawText, $match)) {
                return trim($match[1]);
            }
        }
        return null;
    }
    
    private function extractInstitution($text)
    {
        $patterns = [
            '/from\s+([^,]+(?:University|College|Institute|School))/i',
            '/at\s+([^,]+(?:University|College|Institute|School))/i'
        ];
        
        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $text, $match)) {
                return trim($match[1]);
            }
        }
        return '';
    }
    
    private function calculateTotalExperience()
    {
        $totalMonths = 0;
        $workSection = $this->extractSection(['Work Experience', 'Professional Experience']);
        
        if ($workSection) {
            preg_match_all('/(\d{4})\s*[-–]\s*(\d{4}|Present|Current)/i', $workSection, $matches, PREG_SET_ORDER);
            
            foreach ($matches as $match) {
                $start = (int)$match[1];
                $end = preg_match('/Present|Current/i', $match[2]) ? date('Y') : (int)$match[2];
                $totalMonths += ($end - $start) * 12;
            }
        }
        
        return round($totalMonths / 12, 1);
    }
    
    private function getEmptyData()
    {
        return [
            'full_name' => '',
            'email' => '',
            'phone' => '',
            'gender' => null,
            'age' => null,
            'job_title' => '',
            'experience_type' => 'fresher',
            'exp_years' => 0,
            'exp_months' => 0,
            'preferred_locations' => [],
            'employment_type' => 'full_time',
            'current_salary' => null,
            'expected_salary' => null,
            'skills' => [],
            'languages' => [],
            'education_level' => null,
            'education' => [],
            'work_experience' => [],
            'availability' => 'flexible',
            'current_position' => '',
            'current_company' => '',
            'total_experience_years' => 0
        ];
    }
}