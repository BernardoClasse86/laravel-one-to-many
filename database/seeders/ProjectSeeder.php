<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {

            $project = new Project();

            $project->title = $faker->unique()->sentence($faker->numberBetween(1, 4));
            $project->client_name = $faker->optional()->name();
            $project->description = $faker->optional()->paragraph($faker->numberBetween(4, 6), true);
            $project->project_url = $faker->url();
            $project->project_date = $faker->dateTimeBetween('-1 year', 'now');
            $project->slug = Str::slug($project->title, '-');

            $project->save();
        }
    }
}
