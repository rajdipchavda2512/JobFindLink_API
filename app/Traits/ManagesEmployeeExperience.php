<?php
// app/Traits/ManagesEmployeeExperience.php

namespace App\Traits;

use App\Models\Employee;
use Illuminate\Support\Facades\Log;

trait ManagesEmployeeExperience
{
    /**
     * Calculate total experience from work history
     */
    protected function calculateTotalExperience($experiences)
    {
        $totalMonths = 0;
        
        foreach ($experiences as $experience) {
            if (isset($experience['start_date']) && !empty($experience['start_date'])) {
                try {
                    $start = new \DateTime($experience['start_date']);
                    $end = isset($experience['currently_working']) && $experience['currently_working'] 
                        ? new \DateTime() 
                        : (isset($experience['end_date']) && !empty($experience['end_date']) 
                            ? new \DateTime($experience['end_date']) 
                            : null);
                    
                    if ($end && $start < $end) {
                        $diff = $start->diff($end);
                        $totalMonths += ($diff->y * 12) + $diff->m;
                    }
                } catch (\Exception $e) {
                    Log::warning('Date calculation error: ' . $e->getMessage());
                }
            }
        }
        
        return [
            'years' => floor($totalMonths / 12),
            'months' => $totalMonths % 12,
            'total_months' => $totalMonths
        ];
    }
    
    /**
     * Update employee experience fields
     */
    protected function updateEmployeeExperience(Employee $employee, $experiences)
    {
        $calculated = $this->calculateTotalExperience($experiences);
        
        $employee->exp_years = $calculated['years'];
        $employee->exp_months = $calculated['months'];
        $employee->total_experience = $calculated['years'] + ($calculated['months'] / 12);
        
        return $employee;
    }
    
    /**
     * Format experience for display
     */
    protected function formatExperience($years, $months)
    {
        if ($years == 0 && $months == 0) {
            return 'Fresher';
        }
        
        $parts = [];
        if ($years > 0) {
            $parts[] = $years . ' year' . ($years > 1 ? 's' : '');
        }
        if ($months > 0) {
            $parts[] = $months . ' month' . ($months > 1 ? 's' : '');
        }
        
        return implode(' ', $parts);
    }
}