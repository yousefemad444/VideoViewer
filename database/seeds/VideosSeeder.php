<?php

use Illuminate\Database\Seeder;

class VideosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $images = [
            'test.jpg',
            '1601310902.jpg',
            '1601312751.jpg'
        ];

        $youtube=[
            'https://www.youtube.com/watch?v=ahlbcrVSZgM',
            'https://www.youtube.com/watch?v=D4auWwMsEnY',
            'https://www.youtube.com/watch?v=osbydBe1ntw',
            'https://www.youtube.com/watch?v=dJhrjc8ULhg'
        ];
        $ids=[1,2,3,4,5,6,7,8,9];
        for ($i = 0; $i < 10; $i++) {
            $array = [
                'name' => $faker->word,
                'desc' => $faker->paragraph,
                'meta_keywords' => $faker->name,
                'meta_desc' => $faker->paragraph,
                'category_id' => rand(1, 10),
                'youtube' => $youtube[rand(0,3)],
                'published' => rand(0, 1),
                'image' => $images[rand(0,2)],
                'user_id' => 1
            ];
            $video= \App\Models\Video::create($array);
            $video->skills()->sync(array_rand($ids,2));
            $video->tags()->sync(array_rand($ids,3));
        }
    }
}
