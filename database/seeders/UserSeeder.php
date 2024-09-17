<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Create roles
        //  $adminRole = Role::firstOrCreate(['name' => 'admin']);
        //  $managerRole = Role::firstOrCreate(['name' => 'manager']);
        //  $userRole = Role::firstOrCreate(['name' => 'user']);
 
         // Create users and assign roles
    //      $admin = User::create([
    //          'name' => 'John Doe',
    //          'email' => 'john.doe@example.com',
    //          'password' => Hash::make('password123')
    //      ]);
    //      $admin->assignRole($adminRole);
 
    //      $manager = User::create([
    //          'name' => 'Jane Smith',
    //          'email' => 'jane.smith@example.com',
    //          'password' => Hash::make('password123')
    //      ]);
    //      $manager->assignRole($managerRole);
 
    //      $user = User::create([
    //          'name' => 'Hammad Khan',
    //          'email' => 'hammad.khan@example.com',
    //          'password' => Hash::make('password123')
    //      ]);
    //      $user->assignRole($userRole);

    
    }
}
