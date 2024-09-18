<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;



class RolesSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);
        $managerRole = Role::firstOrCreate(['name' => 'manager']);

        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Admin User', 'password' => Hash::make('password123')]
        );
        $admin->assignRole($adminRole);
        Log::info('Admin user assigned role:', ['user' => $admin->email, 'role' => $adminRole->name]);

        $user = User::firstOrCreate(
            ['email' => 'user@example.com'],
            ['name' => 'Regular User', 'password' => Hash::make('password123')]
        );
        $user->assignRole($userRole);
        Log::info('User assigned role:', ['user' => $user->email, 'role' => $userRole->name]);

        $manager = User::firstOrCreate(
            ['email' => 'manager@example.com'],
            ['name' => 'Manager User', 'password' => Hash::make('password123')]
        );
        $manager->assignRole($managerRole);
        Log::info('Manager user assigned role:', ['user' => $manager->email, 'role' => $managerRole->name]);
    }
}
