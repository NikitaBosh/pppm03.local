<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Аудио', 'Видео', 'Текстовый документ', 'Изображение'];
        for ($i=0; $i < count($categories); $i++) { 
            Category::factory()
            ->count(1)
            ->customCategory($categories[$i])
            ->create();
        }
    }
}
