<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$job = \App\Models\Job::find(1);
$user = \App\Models\User::where('role', 'employer')->first();

echo "Job: " . json_encode($job) . "\n";
echo "First Employer User: " . json_encode($user) . "\n";
