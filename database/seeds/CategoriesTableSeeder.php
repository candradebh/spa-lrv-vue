<?php

use App\Models\Category;
use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        Category::truncate();
        Product::truncate();

        foreach(range(1, 25) as $i) {

            $category = Category::create([
                'name' => $faker->firstName
            ]);

            foreach(range(1, mt_rand(2, 6)) as $j) {
                Product::create([
                    'category_id' => $category->id,
                    'name' => $faker->name,
                    'description' => $faker->text
                ]);
            }
        }
    }
}
