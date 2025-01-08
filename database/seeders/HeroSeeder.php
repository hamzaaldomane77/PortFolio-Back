<?php

namespace Database\Seeders;

use App\Models\Hero;
use App\Models\HeroSlider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hero =[
            'title' => 'Hi, I\'m a passionate Fullstack Developer with a strong foundation in HTML, CSS, JavaScript, TypeScript, React, PHP and Laravel. Eager to collaborate with experts, contribute to success, and enhance abilities.',
            'my_cv' => 'file/hero/ProfessionalCVResume.pdf'
        ];

        $hero_sliders = [
            [
                'hero_id' => 1,
                'photo_slide' => 'image/heroSliders/bootstrap.svg',
                'photo_title' => 'BootStrap'
            ],
            [
                'hero_id' => 1,
                'photo_slide' => 'image/heroSliders/css.svg',
                'photo_title' => 'CSS'
            ],
            [
                'hero_id' => 1,
                'photo_slide' => 'image/heroSliders/html.svg',
                'photo_title' => 'HTML'
            ],
            [
                'hero_id' => 1,
                'photo_slide' => 'image/heroSliders/js.svg',
                'photo_title' => 'JavaScript'
            ],
            [
                'hero_id' => 1,
                'photo_slide' => 'image/heroSliders/laravel-2.svg',
                'photo_title' => 'Laravel'
            ],
            [
                'hero_id' => 1,
                'photo_slide' => 'image/heroSliders/mysql-1.svg',
                'photo_title' => 'MySQL'
            ],
            [
                'hero_id' => 1,
                'photo_slide' => 'image/heroSliders/php-1.svg',
                'photo_title' => 'PHP'
            ],
            [
                'hero_id' => 1,
                'photo_slide' => 'image/heroSliders/react.svg',
                'photo_title' => 'React.js'
            ],
            [
                'hero_id' => 1,
                'photo_slide' => 'image/heroSliders/redux.svg',
                'photo_title' => 'Redux'
            ],
            [
                'hero_id' => 1,
                'photo_slide' => 'image/heroSliders/typescript.svg',
                'photo_title' => 'TypeScript'
            ],
        ];
        Hero::create($hero);
        foreach($hero_sliders as $hero_slider){
            HeroSlider::create($hero_slider);
        }
    }
}
