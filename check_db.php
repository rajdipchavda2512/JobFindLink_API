<?php

require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\EmployeeProfile;
use App\Models\User;

echo "\n=== EMPLOYEE PROFILES IN DATABASE ===\n\n";

$profiles = EmployeeProfile::with('user')->latest()->take(5)->get();

if ($profiles->isEmpty()) {
    echo "No employee profiles found in database.\n";
} else {
    foreach ($profiles as $profile) {
        echo "---\n";
        echo "User       : " . ($profile->user->full_name ?? 'N/A') . " (ID: " . $profile->user_id . ")\n";
        echo "Mobile     : " . ($profile->user->mobile ?? 'N/A') . "\n";
        echo "Pref Locs  : " . json_encode($profile->preferred_locations, JSON_UNESCAPED_UNICODE) . "\n";
        echo "Exp Salary : " . ($profile->expected_salary !== null ? '₹' . $profile->expected_salary : 'NULL') . "\n";
        echo "Experience : " . ($profile->experience_type ?? 'NULL') . "\n";
        echo "Job Pos    : " . ($profile->job_position ?? 'NULL') . "\n";
        echo "Age/Gender : " . ($profile->age ?? 'NULL') . " / " . ($profile->gender ?? 'NULL') . "\n";
        echo "\n";
    }
}

echo "=== RAW DB (preferred_locations column) ===\n";
$raw = DB::select("SELECT user_id, preferred_locations, expected_salary FROM employee_profiles ORDER BY id DESC LIMIT 5");
foreach ($raw as $row) {
    echo "user_id={$row->user_id} | preferred_locations={$row->preferred_locations} | expected_salary={$row->expected_salary}\n";
}
