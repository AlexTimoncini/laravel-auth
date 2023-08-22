<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Faker\Generator as Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            $newProject = new Project();
            $newProject->title = $faker->sentence(3);
            $newProject->topic = $faker->sentence(2);
            $newProject->date = $faker->date();
            $newProject->gitHub = $faker->url();
            $newProject->save();
        }
    }
}
