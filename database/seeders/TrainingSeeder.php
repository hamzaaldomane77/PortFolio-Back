<?php

namespace Database\Seeders;

use App\Models\Training;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Training::create([
            'training_name'             => 'BackEnd Beginners Cource',
            'company_name'              => 'Focal X Agency',
            'description'               => 'I worked in and underwent a four-month paid training program at FOCAL X. This is a comprehensive training program that focuses on backend development and provided me with valuable experience in web technologies. During the training, I got practical experience in building API interfaces, in addition to mastering Blade PHP, MySQL, Laravel, in addition to HTML, CSS, and Bootstrap.',
            'company_logo'              => 'image/training/111focal_logo.jfif',
            'company_link'              => 'https://www.focal-x.com/',
            'certificate_link'          => 'https://drive.google.com/file/d/1pt6l5ft2oPewdYxAeeIDH4cN7HxwZOKv/view?usp=sharing',
            'recomendation_letter_link' => 'https://drive.google.com/file/d/1DnvVAmjtiPDRW_zKj1AdQhneQaQc9pe7/view?usp=sharing',
        ]);
    }
}
