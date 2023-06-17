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
            'title' => 'School Website Design',
            'description' => '<p>UI/UX design for school profile website</p>',
            'link' => 'https://www.figma.com/file/vh6Mem9yRIiwh2GWBuE9GY/Desain-Web-Sekolah-Kelompok-6-Kelas-5D?node-id=11%3A2&t=osXquG0hnECnzyDd-1',
            'image' => 'sma.png',
            'tech' => ['figma'],
            'type' => 'Coursework',
            'password' => null
        ]);

        Project::create([
            'title' => 'School Mail Management System',
            'description' => 'Web Applicarion for managing mail at school',
            'link' => 'https://github.com/fadilmartias/rplbo-2021-kelas-d-kelompok-5',
            'image' => 'github.jpeg',
            'tech' => ['bootstrap', 'js', 'laravel', 'mysql'],
            'type' => 'Coursework',
            'password' => null
        ]);

        Project::create([
            'title' => 'Pelaporan EMIS Kemenag',
            'description' => 'Application for PTIPD UIN Suska Riau to sync data between PTIPD database and EMIS Kemenag database',
            'link' => 'https://github.com/heyikhwan/pelaporan-emis',
            'image' => 'github.jpeg',
            'tech' => ['bootstrap', 'js', 'laravel', 'mysql'],
            'type' => 'Apprenticeship Project',
            'password' => null
        ]);

        Project::create([
            'title' => 'Go-Bengkel Design',
            'description' => 'UI/UX Design for Go-Bengkel Application',
            'link' => null,
            'image' => 'bengkel.png',
            'tech' => ['figma'],
            'type' => 'Coursework',
            'password' => null
        ]);

        Project::create([
            'title' => 'Fadil Films',
            'description' => 'Website to inform movie films',
            'link' => 'https://github.com/fadilmartias/fadil-films',
            'image' => 'github.jpeg',
            'tech' => ['boostrap', 'react'],
            'type' => 'Personal Project',
            'password' => null
        ]);

        Project::create([
            'title' => 'Fadil Linktree',
            'description' => 'Linktree Website that contains my social media links',
            'link' => 'https://padil-linktree.fadilmartias.repl.co/',
            'image' => 'linktree.png',
            'tech' => ['html', 'css'],
            'type' => 'Personal Project',
            'password' => null
        ]);

        Project::create([
            'title' => 'Resi Logistik',
            'description' => 'Application for managing and tracking order, and also print order receipt',
            'link' => 'https://github.com/fadilmartias/resi-logistik',
            'image' => 'github.jpeg',
            'tech' => ['bootstrap', 'js', 'laravel', 'mysql'],
            'type' => 'Personal Project',
            'password' => null
        ]);

        Project::create([
            'title' => 'Obat API',
            'description' => 'API for accessing drugs data with JWT Authentication',
            'link' => 'https://github.com/fadilmartias/obat-api',
            'image' => 'github.jpeg',
            'tech' => ['lumen'],
            'type' => 'Personal Project',
            'password' => null
        ]);

        Project::create([
            'title' => 'News Portal',
            'description' => 'News Portal',
            'link' => 'https://github.com/fadilmartias/news-portal',
            'image' => 'github.jpeg',
            'tech' => ['tailwind', 'inertia', 'react', 'laravel', 'mysql'],
            'type' => 'Personal Project',
            'password' => null
        ]);

        Project::create([
            'title' => 'Chatbot WA',
            'description' => 'WhatsApp chatbot that can reply depends users messages',
            'link' => 'https://github.com/fadilmartias/chatbot-wa',
            'image' => 'github.jpeg',
            'tech' => ['js', 'node'],
            'type' => 'Personal Project',
            'password' => null
        ]);

        Project::create([
            'title' => 'Pildun Store',
            'description' => 'Online Store for buy World Cup 2022 merchandise',
            'link' => 'https://pildunstore.masuk.id/',
            'image' => 'pildun.png',
            'tech' => ['bootstrap', 'js', 'laravel', 'mysql'],
            'type' => 'Garuda Cyber Laravel Class Assignment',
            'password' => null
        ]);

        Project::create([
            'title' => 'Prafadishop',
            'description' => "Online Store for buy women's hijabs",
            'link' => 'http://prafadishop.masuk.web.id/',
            'image' => 'prafadishop.png',
            'tech' => ['bootstrap', 'js', 'laravel', 'mysql'],
            'type' => 'Freelance Project',
            'password' => null
        ]);

        Project::create([
            'title' => 'Next Portfolio',
            'description' => 'Personal Portfolio Website that created using Next.Js and Sass',
            'link' => 'https://github.com/fadilmartias/next-portfolio',
            'image' => 'github.jpeg',
            'tech' => ['next', 'sass'],
            'type' => 'Personal Project',
            'password' => null
        ]);

        Project::create([
            'title' => 'Portfolio NT',
            'description' => 'Personal Portfolio Website that created using Next.Js and Tailwind CSS',
            'link' => 'https://github.com/fadilmartias/portfolio-nt',
            'image' => 'github.jpeg',
            'tech' => ['next', 'tailwind'],
            'type' => 'Personal Project',
            'password' => null
        ]);

        Project::create([
            'title' => 'JWT Auth',
            'description' => 'Web Application that consume API with JWT Authentication',
            'link' => 'https://github.com/fadilmartias/jwt-auth',
            'image' => 'github.jpeg',
            'tech' => ['bulma', 'react', 'express', 'node', 'mysql'],
            'type' => 'Personal Project',
            'password' => null
        ]);

        Project::create([
            'title' => 'Mobile View for BUDI Kemdikbud',
            'description' => 'Slicing mobile view design from Figma to code',
            'link' => 'https://budi.kemdikbud.go.id/',
            'image' => 'budi.png',
            'tech' => ['html' ,'css', 'bootstrap'],
            'type' => 'Personal Project',
            'password' => null
        ]);

        Project::create([
            'title' => 'Laracamp',
            'description' => 'Application to make it easier for users to buy web development courses',
            'link' => 'https://github.com/fadilmartias/laracamp',
            'image' => 'laracamp.png',
            'tech' => ['bootstrap', 'js', 'laravel', 'mysql'],
            'type' => 'BWA Class Project',
            'password' => null
        ]);

        Project::create([
            'title' => 'Ara Farma Management System',
            'description' => 'Application for managing stocks and transactions in Apotek Ara Farma',
            'link' => 'https://github.com/fadilmartias/apotekara',
            'image' => 'ara.png',
            'tech' => ['bootstrap', 'js', 'laravel', 'mysql'],
            'type' => 'Personal Project',
            'password' => null
        ]);

        Project::create([
            'title' => 'BMN Suska',
            'description' => 'Application for managing inventory of goods in UIN Suska Riau',
            'link' => 'https://bmn-dev.uin-suska.ac.id/',
            'image' => 'bmn.png',
            'tech' => ['bootstrap', 'js', 'laravel', 'mysql'],
            'type' => 'Freelance Project',
            'password' => null
        ]);

        Project::create([
            'title' => 'PTIPD UIN Suska Riau Website',
            'description' => 'Company profile website for Pusat Teknologi Informasi dan Pangkalan Data UIN Suska Riau',
            'link' => 'https://ptipd.uin-suska.ac.id/',
            'image' => 'ptipd.png',
            'tech' => ['wordpress'],
            'type' => 'Freelance Project',
            'password' => null
        ]);

        Project::create([
            'title' => 'Admin App for Beban Kerja Dosen UIN SUSKA RIAU (In Development)',
            'description' => 'Admin App for Beban Kerja Dosen UIN SUSKA RIAU',
            'link' => '#',
            'image' => 'bkd-admin.png',
            'tech' => ['bootstrap', 'react'],
            'type' => 'Freelance Project',
            'password' => 'admin-bkd-uin'
        ]);

        Project::create([
            'title' => 'Dosen App for Beban Kerja Dosen UIN SUSKA RIAU (In Development)',
            'description' => 'Dosen App for Beban Kerja Dosen UIN SUSKA RIAU',
            'link' => '#',
            'image' => 'bkd-dosen.png',
            'tech' => ['tailwind', 'react'],
            'type' => 'Freelance Project',
            'password' => 'dosen-bkd-uin'
        ]);
    }
}
