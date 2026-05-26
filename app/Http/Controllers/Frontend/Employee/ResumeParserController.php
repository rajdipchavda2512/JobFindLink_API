<?php

namespace App\Http\Controllers\Frontend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Storage;
use Smalot\PdfParser\Parser;
use PhpOffice\PhpWord\IOFactory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class ResumeParserController extends Controller
{
    /**
     * Parse uploaded resume and extract information
     */
    public function parseResume(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'resume' => 'required|file|mimes:pdf,doc,docx|max:5120'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed: ' . $validator->errors()->first()
                ], 422);
            }
            
            $file = $request->file('resume');
            $extension = $file->getClientOriginalExtension();
            $text = '';
            
            // Extract text based on file type
            if ($extension === 'pdf') {
                $text = $this->parsePDF($file);
            } elseif ($extension === 'docx') {
                $text = $this->parseDOCX($file);
            } elseif ($extension === 'doc') {
                $text = $this->parseDOC($file);
            }
            
            if (empty($text) || strlen($text) < 50) {
                return response()->json([
                    'success' => false,
                    'message' => 'Could not extract text from the resume. Please ensure your resume contains selectable text and try again.'
                ], 400);
            }
            
            $parsedData = $this->extractInformation($text);
            
            return response()->json([
                'success' => true,
                'data' => $parsedData,
                'message' => 'Resume parsed successfully'
            ]);
            
        } catch (\Exception $e) {
            Log::error('Resume parsing error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error parsing resume: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Parse PDF file
     */
    private function parsePDF($file)
    {
        try {
            $parser = new Parser();
            $pdf = $parser->parseFile($file->getPathname());
            $text = $pdf->getText();
            $text = preg_replace('/\s+/', ' ', $text);
            return trim($text);
        } catch (\Exception $e) {
            Log::error('PDF parsing error: ' . $e->getMessage());
            return '';
        }
    }

    /**
     * Parse DOCX file
     */
    private function parseDOCX($file)
    {
        try {
            $phpWord = IOFactory::load($file->getPathname());
            $text = '';
            foreach ($phpWord->getSections() as $section) {
                foreach ($section->getElements() as $element) {
                    if (method_exists($element, 'getText')) {
                        $text .= $element->getText() . "\n";
                    }
                }
            }
            return trim($text);
        } catch (\Exception $e) {
            Log::error('DOCX parsing error: ' . $e->getMessage());
            return '';
        }
    }

    /**
     * Parse DOC file
     */
    private function parseDOC($file)
    {
        try {
            $content = file_get_contents($file->getPathname());
            $text = preg_replace('/[^\x20-\x7E\x0A\x0D]/', ' ', $content);
            return trim($text);
        } catch (\Exception $e) {
            Log::error('DOC parsing error: ' . $e->getMessage());
            return '';
        }
    }

    /**
     * Extract structured information from resume text
     */
    private function extractInformation($text)
    {
        $data = [
            'full_name' => $this->extractName($text),
            'email' => $this->extractEmail($text),
            'phone' => $this->extractPhone($text),
            'skills' => $this->extractSkills($text),
            'experience_years' => $this->extractExperienceYears($text),
            'education_level' => $this->extractEducationLevel($text),
            'job_titles' => $this->extractJobTitles($text),
            'companies' => $this->extractCompanies($text),
            'languages' => $this->extractLanguages($text),
        ];

        return $data;
    }

    /**
     * Extract full name from resume text
     */
    private function extractName($text)
    {
        $lines = explode("\n", $text);
        foreach ($lines as $line) {
            $line = trim($line);
            // Pattern for name: 2-3 words starting with capital letters
            if (preg_match('/^[A-Z][a-z]+(?:\s+[A-Z][a-z]+){1,2}$/', $line) && strlen($line) < 50) {
                if (!preg_match('/(resume|cv|curriculum|vitae|contact|phone|email)/i', $line)) {
                    return $line;
                }
            }
        }
        return null;
    }

    /**
     * Extract email from resume text
     */
    private function extractEmail($text)
    {
        $pattern = '/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/';
        if (preg_match($pattern, $text, $matches)) {
            return $matches[0];
        }
        return null;
    }

    /**
     * Extract phone number from resume text
     */
    private function extractPhone($text)
    {
        // Fixed patterns with proper escaping
        $patterns = [
            '/\+91[-\s]?[6-9]\d{9}/',
            '/[6-9]\d{9}/',
            '/[0-9]{3}[-.\s]?[0-9]{3}[-.\s]?[0-9]{4}/',
            '/\(\d{3}\)\s?\d{3}[-.\s]?\d{4}/'
        ];
        
        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $text, $matches)) {
                $phone = preg_replace('/[^0-9]/', '', $matches[0]);
                if (strlen($phone) >= 10) {
                    return $phone;
                }
            }
        }
        return null;
    }

    /**
     * Extract skills from resume text
     */
    private function extractSkills($text)
    {
        $commonSkills = [
            'PHP', 'Laravel', 'JavaScript', 'React', 'Vue.js', 'Angular', 'Node.js',
            'Python', 'Java', 'C\+\+', 'C#', 'Ruby', 'Go', 'Swift', 'Kotlin',
            'HTML', 'CSS', 'SASS', 'LESS', 'Bootstrap', 'Tailwind',
            'MySQL', 'PostgreSQL', 'MongoDB', 'Redis', 'Firebase',
            'AWS', 'Azure', 'Google Cloud', 'Docker', 'Kubernetes', 'Jenkins',
            'Git', 'GitHub', 'GitLab', 'Bitbucket', 'JIRA', 'Confluence',
            'Project Management', 'Leadership', 'Communication', 'Problem Solving',
            'Agile', 'Scrum', 'Kanban', 'DevOps', 'CI\/CD', 'REST API', 'GraphQL'
        ];
        
        $foundSkills = [];
        foreach ($commonSkills as $skill) {
            // Escape special regex characters in skill name
            $escapedSkill = preg_quote($skill, '/');
            if (preg_match('/\b' . $escapedSkill . '\b/i', $text)) {
                $foundSkills[] = $skill;
            }
        }
        
        return array_slice($foundSkills, 0, 10);
    }

    /**
     * Extract total years of experience
     */
    private function extractExperienceYears($text)
    {
        $patterns = [
            '/(\d+)\+?\s*(?:years?|yrs?)\s+of\s+experience/i',
            '/experience\s*:\s*(\d+)\+?\s*(?:years?|yrs?)/i',
            '/(\d+)\s*(?:years?|yrs?)\s+experience/i',
            '/total experience\s*:\s*(\d+)\+?\s*(?:years?|yrs?)/i',
        ];
        
        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $text, $matches)) {
                $years = intval($matches[1]);
                if ($years > 0 && $years < 50) {
                    return $years;
                }
            }
        }
        return 0;
    }

    /**
     * Extract education level
     */
    private function extractEducationLevel($text)
    {
        $educationLevels = [
            'PhD/Doctorate' => ['PhD', 'Doctorate', 'Doctor of Philosophy', 'Ph.D', 'DPhil'],
            "Master's Degree" => ['Master', 'Masters', 'MSc', 'MA', 'MBA', 'MCA', 'M.Tech', 'M.E.', 'Post Graduate', 'MS', 'M.S.'],
            "Bachelor's Degree" => ['Bachelor', 'Bachelors', 'BSc', 'BA', 'BCom', 'BCA', 'BBA', 'B.Tech', 'B.E.', 'BE', 'BTech', 'Undergraduate', 'B.S.', 'B.A.'],
            'Diploma' => ['Diploma', 'Advanced Diploma', 'PG Diploma'],
            'ITI' => ['ITI', 'Industrial Training Institute'],
            '12th' => ['12th', 'HSC', 'Intermediate', 'Higher Secondary', 'Class 12', 'Grade 12'],
            '10th' => ['10th', 'SSC', 'Matriculation', 'Secondary', 'Class 10', 'Grade 10']
        ];
        
        foreach ($educationLevels as $level => $keywords) {
            foreach ($keywords as $keyword) {
                $escapedKeyword = preg_quote($keyword, '/');
                if (preg_match('/\b' . $escapedKeyword . '\b/i', $text)) {
                    return $level;
                }
            }
        }
        return null;
    }

    /**
     * Extract job titles from resume
     */
    private function extractJobTitles($text)
    {
        $commonTitles = [
            'Software Engineer', 'Senior Software Engineer', 'Full Stack Developer',
            'Frontend Developer', 'Backend Developer', 'DevOps Engineer',
            'Project Manager', 'Product Manager', 'Business Analyst',
            'Data Scientist', 'Data Analyst', 'QA Engineer', 'System Administrator',
            'Network Engineer', 'Security Analyst', 'Technical Lead', 'Engineering Manager',
            'UI/UX Designer', 'Graphic Designer', 'Marketing Manager', 'Sales Manager',
            'HR Manager', 'Accountant', 'Finance Manager', 'Operations Manager'
        ];
        
        $foundTitles = [];
        foreach ($commonTitles as $title) {
            // Escape special regex characters
            $escapedTitle = preg_quote($title, '/');
            if (preg_match('/\b' . $escapedTitle . '\b/i', $text)) {
                $foundTitles[] = $title;
            }
        }
        
        return array_slice($foundTitles, 0, 3);
    }

    /**
     * Extract company names from resume
     */
    private function extractCompanies($text)
    {
        $lines = explode("\n", $text);
        $companies = [];
        $companyKeywords = ['at ', 'with ', 'company:', 'organization:', 'employer:', 'worked at', 'employed at', 'company name:'];
        
        foreach ($lines as $line) {
            foreach ($companyKeywords as $keyword) {
                if (stripos($line, $keyword) !== false) {
                    $parts = explode($keyword, $line);
                    if (isset($parts[1])) {
                        $company = trim($parts[1]);
                        $company = preg_replace('/[^\w\s&.]/', '', $company);
                        $company = preg_replace('/\s+/', ' ', $company);
                        if (strlen($company) > 2 && strlen($company) < 100 && !in_array($company, $companies)) {
                            $companies[] = $company;
                        }
                    }
                }
            }
        }
        
        return array_unique($companies);
    }

    /**
     * Extract languages from resume
     */
    private function extractLanguages($text)
    {
        $commonLanguages = [
            'English', 'Hindi', 'Gujarati', 'Marathi', 'Bengali', 'Tamil', 'Telugu',
            'Kannada', 'Malayalam', 'Punjabi', 'Urdu', 'French', 'German', 'Spanish',
            'Japanese', 'Chinese', 'Russian', 'Arabic', 'Portuguese', 'Italian'
        ];
        
        $foundLanguages = [];
        foreach ($commonLanguages as $language) {
            $escapedLanguage = preg_quote($language, '/');
            if (preg_match('/\b' . $escapedLanguage . '\b/i', $text)) {
                $foundLanguages[] = $language;
            }
        }
        
        // Always add English if not found (common default)
        if (!in_array('English', $foundLanguages) && preg_match('/english/i', $text)) {
            $foundLanguages[] = 'English';
        }
        
        return array_slice($foundLanguages, 0, 5);
    }
}