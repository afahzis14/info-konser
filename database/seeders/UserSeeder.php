<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get roles
        $superadminRole = Role::where('name', 'superadmin')->first();
        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();

        // Create Superadmin
        $superadmin = User::firstOrCreate(
            ['email' => 'superadmin@info-konser.com'],
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@info-konser.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
        if ($superadminRole && !$superadmin->hasRole('superadmin')) {
            $superadmin->assignRole('superadmin');
        }

        // Create Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@info-konser.com'],
            [
                'name' => 'Admin',
                'email' => 'admin@info-konser.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
        if ($adminRole && !$admin->hasRole('admin')) {
            $admin->assignRole('admin');
        }

        // Create User
        $user = User::firstOrCreate(
            ['email' => 'user@info-konser.com'],
            [
                'name' => 'User',
                'email' => 'user@info-konser.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
        if ($userRole && !$user->hasRole('user')) {
            $user->assignRole('user');
        }

        $this->command->info('Users created successfully!');
        $this->command->info('Superadmin: superadmin@info-konser.com / password');
        $this->command->info('Admin: admin@info-konser.com / password');
        $this->command->info('User: user@info-konser.com / password');
    }
}

