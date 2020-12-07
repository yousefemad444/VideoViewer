<?php

use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
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
            ];
            \App\Models\Tag::create($array);
        }
    }
}
