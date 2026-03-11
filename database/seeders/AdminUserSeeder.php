<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email = 'admin@dhammasambhava.org';

        if (\App\Models\User::where('email', $email)->exists()) {
            echo "Admin user already exists!\n";
            return;
        }

        \App\Models\User::create([
            'name' => 'Admin User',
            'email' => $email,
            'password' => bcrypt('password'), // Change this after first login
            'role' => 'super_admin',
            'email_verified_at' => now(),
        ]);

        echo "Admin user created:\n";
        echo "Email: admin@dhammasambhava.org\n";
        echo "Password: password\n";
        echo "Please change the password after first login!\n";
    }
}
