<?php

use Illuminate\Database\Seeder;

class SkillsSeeder extends Seeder
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
            \App\Models\Skill::create($array);
        }
    }
}
