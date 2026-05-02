<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Clear Cache
        |--------------------------------------------------------------------------
        */
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        /*
        |--------------------------------------------------------------------------
        | Create Permissions
        |--------------------------------------------------------------------------
        */
        $permissions = [

            // Dashboard
            'dashboard.view',

            // Users
            'users.index',
            'users.create',
            'users.edit',
            'users.delete',
            'users.status',

            // Jobs
            'jobs.index',
            'jobs.view',
            'jobs.approve',
            'jobs.reject',

            // Applications
            'applications.index',

            // Packages
            'packages.index',
            'packages.create',
            'packages.edit',

            // Positions
            'positions.index',
            'positions.create',
            'positions.edit',
            'positions.delete',

            // Categories
            'categories.index',
            'categories.create',
            'categories.edit',
            'categories.delete',

            // Payments
            'payments.index',

            // Roles
            'roles.index',
            'roles.create',
            'roles.edit',
            'roles.delete',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web'
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Create Roles
        |--------------------------------------------------------------------------
        */
        $admin   = Role::firstOrCreate(['name' => 'admin',   'guard_name' => 'web']);
        $manager = Role::firstOrCreate(['name' => 'manager', 'guard_name' => 'web']);
        $hr      = Role::firstOrCreate(['name' => 'hr',      'guard_name' => 'web']);
        $employee= Role::firstOrCreate(['name' => 'employee','guard_name' => 'web']);

        /*
        |--------------------------------------------------------------------------
        | Role Permissions
        | This fills role_has_permissions table
        |--------------------------------------------------------------------------
        */

        // Admin = All Access
        $admin->syncPermissions(Permission::all());

        // Manager
        $manager->syncPermissions([
            'dashboard.view',
            'users.index',
            'users.edit',
            'jobs.index',
            'jobs.view',
            'jobs.approve',
            'applications.index',
            'payments.index',
        ]);

        // HR
        $hr->syncPermissions([
            'dashboard.view',
            'users.index',
            'users.create',
            'users.edit',
            'jobs.index',
            'jobs.view',
            'applications.index',
        ]);

        // Employee
        $employee->syncPermissions([
            'dashboard.view',
            'jobs.index',
            'jobs.view',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Create Users
        |--------------------------------------------------------------------------
        */
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'full_name' => 'System Admin',
                'mobile' => '9999999991',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
                'is_verified' => 1,
                'is_active' => 1,
                'email_verified_at' => now(),
            ]
        );

        $managerUser = User::firstOrCreate(
            ['email' => 'manager@example.com'],
            [
                'name' => 'Manager',
                'full_name' => 'Main Manager',
                'mobile' => '9999999992',
                'password' => Hash::make('12345678'),
                'role' => 'manager',
                'is_verified' => 1,
                'is_active' => 1,
                'email_verified_at' => now(),
            ]
        );

        $hrUser = User::firstOrCreate(
            ['email' => 'hr@example.com'],
            [
                'name' => 'HR',
                'full_name' => 'HR User',
                'mobile' => '9999999993',
                'password' => Hash::make('12345678'),
                'role' => 'hr',
                'is_verified' => 1,
                'is_active' => 1,
                'email_verified_at' => now(),
            ]
        );

        $employeeUser = User::firstOrCreate(
            ['email' => 'employee@example.com'],
            [
                'name' => 'Employee',
                'full_name' => 'Employee User',
                'mobile' => '9999999994',
                'password' => Hash::make('12345678'),
                'role' => 'employee',
                'is_verified' => 1,
                'is_active' => 1,
                'email_verified_at' => now(),
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | Assign Roles To Users
        | This fills model_has_roles table
        |--------------------------------------------------------------------------
        */
        $adminUser->syncRoles(['admin']);
        $managerUser->syncRoles(['manager']);
        $hrUser->syncRoles(['hr']);
        $employeeUser->syncRoles(['employee']);

        /*
        |--------------------------------------------------------------------------
        | Direct User Permissions
        | This fills model_has_permissions table
        |--------------------------------------------------------------------------
        */

        // Extra direct permission to manager user
        $managerUser->givePermissionTo('users.delete');

        // Extra direct permission to HR user
        $hrUser->givePermissionTo('payments.index');
    }
}