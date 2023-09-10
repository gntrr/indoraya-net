<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'gender' => 'L',
            'date_of_birth' => '2003/02/26',
            'role' => 'admin',
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'name' => 'adinet',
            'email' => 'adinet@gmail.com',
            'gender' => 'L',
            'date_of_birth' => '2003/02/26',
            'role' => 'employee',
            'password' => Hash::make('12345678'),
        ]);
    }
}
