<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectPhoto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $project1_model = [
            'title'       => 'VILLA',
            'description' => 'A specialized website for selling villas. It is characterized by containing many villas with different specifications that meet everyone\'s desires in addition to competitive prices.',
            'github_link' => 'https://github.com/YousefSaleh1/VILLA.git',
            'demo_link'   => 'https://yousefsaleh1.github.io/VILLA/',
            'published'   => '2024-03-17',
        ];
        $project1_skills_ids = [2, 5, 6, 8, 9];

        $project2_model = [
            'title'       => 'Employee Management System',
            'description' => 'Employee Management System (EMS) that allows for managing departments and employees within those departments. The system feature a user authentication mechanism, CRUD operations for managing departments and employees, relationships between departments and employees, soft deletion of records, and an API to interact with the system.',
            'github_link' => 'https://github.com/YousefSaleh1/task_8_back_end.git',
            'published'   => '2024-04-26',
        ];
        $project2_skills_ids = [1, 4, 7, 12];

        $project3_model =  [
            'title'       => 'Library Management System',
            'description' => 'An integrated library system with a service for sending emails to users upon every process of adding, borrowing, or returning a book.',
            'github_link' => 'https://github.com/YousefSaleh1/Library-Mangement-System.git',
            'published'   => '2024-05-10',
        ];
        $project3_skills_ids = [1, 4, 7, 12];


        $project_photos = [
            [
                'project_id' => 1,
                'photo'      => 'image/projects/1715253450Screenshot (183).png',
            ],
            [
                'project_id' => 1,
                'photo'      => 'image/projects/1715253477Screenshot (184).png',
            ],
            [
                'project_id' => 1,
                'photo'      => 'image/projects/1715253560Screenshot (185).png',
            ],
            [
                'project_id' => 1,
                'photo'      => 'image/projects/1715253617Screenshot (186).png',
            ],
        ];

        $project1 = Project::create($project1_model);
        $project1->skills()->attach($project1_skills_ids);

        $project2 = Project::create($project2_model);
        $project2->skills()->attach($project2_skills_ids);

        $project3 = Project::create($project3_model);
        $project3->skills()->attach($project3_skills_ids);


        foreach ($project_photos as $project_photo) {
            ProjectPhoto::create($project_photo);
        }
    }
}
