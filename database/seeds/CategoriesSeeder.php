<?php

use Illuminate\Database\Seeder;
class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker\Factory::create();


        for ($i=0;$i<10;$i++){
            $array=[
                'name'=>$faker->word,
                'meta_keywords'=>$faker->name,
                'meta_desc'=>$faker->paragraph,
            ];
            \App\Models\Category::create($array);
        }
    }
}
