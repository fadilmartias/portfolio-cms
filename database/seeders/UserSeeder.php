<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'M. Fadil Martias',
            'email' => 'admin@cms.com',
            'password' => bcrypt('adminadmin'),
        ]);
    }
}
