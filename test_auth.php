<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Get the employer user (id: 3)
$employer = \App\Models\User::where('role', 'employer')->first();
$token = $employer->createToken('test-token')->plainTextToken;

echo "------------------------------\n";
echo "Employer: " . $employer->full_name . " (ID: {$employer->id})\n";
echo "Role: " . $employer->role . "\n";
echo "FRESH TOKEN: " . $token . "\n";
echo "------------------------------\n";
echo "\nCopy the token above and use it in Postman as: Bearer {token}\n";
