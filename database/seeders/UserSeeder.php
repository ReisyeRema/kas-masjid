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
        User::create([
            'name' => 'Admin',
            'username' => 'admin', // ganti dengan username yang diinginkan
            'email' => 'admin@example.com', // tambahkan email
            'password' => Hash::make('12345'), // ganti dengan password yang diinginkan
            'role' => 'admin', // tambahkan role admin
        ]);

        User::create([
            'name' => 'Petugas',
            'username' => 'petugas', // ganti dengan username yang diinginkan
            'email' => 'petugas@example.com', // tambahkan email
            'password' => Hash::make('12345'), // ganti dengan password yang diinginkan
            'role' => 'petugas', // tambahkan role petugas
        ]);    
    }
}
