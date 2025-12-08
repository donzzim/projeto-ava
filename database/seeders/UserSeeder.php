<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'firstName' => 'Lucas',
            'lastName' => 'César',
            'email' => 'lucascesarmengo@gmail.com',
            'password' => bcrypt('12345678')
        ]);
    }
}
