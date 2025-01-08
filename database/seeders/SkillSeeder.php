<?php

namespace Database\Seeders;

use App\Models\Skill;
use App\Models\SkillItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [
            ['skill_name' => 'Programming Languages'],
            ['skill_name' => 'FrameWorks'],
            ['skill_name' => 'Markup Languages'],
            ['skill_name' => 'Libraries'],
            ['skill_name' => 'Additional Skills'],
            ['skill_name' => 'Database Managment'],
        ];

        $skill_items = [
            [
                'skill_id' => 1,
                'item'     => 'PHP',
                'image'    => 'image/skills/1715247882php-1.svg',
            ],
            [
                'skill_id' => 1,
                'item'     => 'JavaScript',
                'image'    => 'image/skills/1715250848js.svg',
            ],
            [
                'skill_id' => 1,
                'item'     => 'TypeScript',
                'image'    => 'image/skills/1715250897typescript.svg',
            ],
            [
                'skill_id' => 2,
                'item'     => 'Laravel',
                'image'    => 'image/skills/1715250982laravel-2.svg',
            ],
            [
                'skill_id' => 3,
                'item'     => 'HTML',
                'image'    => 'image/skills/1715251023html.svg',
            ],
            [
                'skill_id' => 3,
                'item'     => 'CSS',
                'image'    => 'image/skills/1715251060css.svg',
            ],
            [
                'skill_id' => 3,
                'item'     => 'sql',
                'image'    => 'image/skills/1715253975sql-database-sql-azure-svgr',
            ],
            [
                'skill_id' => 4,
                'item'     => 'React.js',
                'image'    => 'image/skills/1715251112react.svg',
            ],
            [
                'skill_id' => 4,
                'item'     => 'Bootstrap',
                'image'    => 'image/skills/1715251158bootstrap.svg',
            ],
            [
                'skill_id' => 5,
                'item'     => 'git',
                'image'    => 'image/skills/1715251212git.svg',
            ],
            [
                'skill_id' => 5,
                'item'     => 'Github',
                'image'    => 'image/skills/1715251245github.svg',
            ],
            [
                'skill_id' => 6,
                'item'     => 'MySQL',
                'image'    => 'image/skills/1715253781mysql-1.svg',
            ],
        ];


            foreach ($skills as $skill) {
                Skill::create($skill);
            }

            foreach ($skill_items as $skill_item) {
                SkillItem::create($skill_item);
            }
    }
}
