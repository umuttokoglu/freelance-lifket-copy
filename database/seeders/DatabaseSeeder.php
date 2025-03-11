<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'MVA Makine',
            'email' => 'admin@deltavinc.com',
            'password' => Hash::make('deltavinc.com'),
        ]);
    }
}
