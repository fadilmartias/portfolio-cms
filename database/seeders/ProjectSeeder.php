<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'title' => 'PTIPD UIN Suska Riau Website',
            'description' => 'Company profile website for Pusat Teknologi Informasi dan Pangkalan Data UIN Suska Riau',
            'link' => 'https://ptipd.uin-suska.ac.id/',
            'image' => 'ptipd.png',
            'tech' => ['wordpress'],
            'type' => 'Freelance Project',
            'password' => bcrypt('cp')
        ]);
    }
}
