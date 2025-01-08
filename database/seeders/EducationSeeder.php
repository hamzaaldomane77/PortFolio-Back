<?php

namespace Database\Seeders;

use App\Models\Education;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Education::create([
            'title' => 'Bashelors Degree In Information Technology',
            'description' => 'I hold a degree in Information Technology Engineering,which has equipped me with a solid foundation in computer science and engineering principles. including , software development database management, network engineering During my academic journey, I gained hands on experience in coding, system design, and the development of software applications. I honed my skills in programming languages like Java, react, Html, css, JavaScript, python, php, Laravel, C# and C++ allowing me to create efficient and reliable software solutions My educational background in information Technology Engineering has not only equipped me with a strong technical skill set but has also fostered problem solving abilities and a commitment to staying updated with the latest advancements in the IT field. I am eager to apply my knowledge and skills to contribute effectively to any technology related project or organization .',
            'photo' => 'image/educations/certificate.jpg'
        ]);
    }
}
