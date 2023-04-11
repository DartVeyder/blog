<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categories; 
use App\Models\News;
use App\Models\NewsDescription; 
use App\Models\CategoryDescription;
use Faker\Factory as Faker;

class NewsAndCategoriesSeeder extends Seeder
{ 
    public function run()
    {
        $faker = Faker::create();

        // Генерація категорій та описів категорій на українській та англійській мовах
        for ($i = 1; $i <= 10; $i++) {
            // Генерація нової категорії
            $categoryUk = $faker->word; // Українська назва категорії
            $categoryEn = $faker->word; // Англійська назва категорії
            $category = Categories::create([]);
 
            CategoryDescription::create([
                'category_id' => $category->id,
                'name' => $categoryUk,
                'language_id' => 1,
            ]);
        }

        // Генерація новин та описів новин на українській та англійській мовах
        for ($i = 1; $i <= 20; $i++) {
            // Генерація нової новини
            $titleUk = $faker->sentence(5); // Український заголовок новини
            $titleEn = $faker->sentence(5); // Англійський заголовок новини 
            $news = News::create([]);

            // Генерація опису новини
            $descriptionUk = $faker->paragraph; // Український опис новини
            $descriptionEn = $faker->paragraph; // Англійський опис новини
            NewsDescription::create([
                'news_id' => $news->id,
                'title' => $titleUk,
                'language_id' => 1,
                'content' => $descriptionUk
            ]);

            // Призначення категорій для новини
            $categories = Categories::all();
            $news->category()->attach($categories->random(rand(1, 3))->pluck('id'));
        }
    }
}