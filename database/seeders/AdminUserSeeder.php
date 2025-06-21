<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'],  // unique identifier
            [
                'username' => 'admin',
                'FName' => 'Admin',
                'LName' => 'User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password123'), // change password to something secure!
                'is_admin' => true,
            ]
        );
         User::updateOrCreate(
            ['email' => 'mona@example.com'],  // unique identifier
            [
                'username' => 'mona_alrayes',
                'FName' => 'mona',
                'LName' => 'alrayes',
                'email' => 'mona@example.com',
                'password' => Hash::make('123456'), // change password to something secure!
                'is_admin' => false,
            ]
        );
    }
}
