<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

           User::create([
            'name'=>'KIZALU',
            'email'=>'Kizalusoft@gmail.com',
            'password'=>Hash::make(123456789),
            'adimin'=>1
           ]);
    }
}
