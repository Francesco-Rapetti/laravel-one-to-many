<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = config("projects");

        foreach ($projects as $project) {
            $newProject = new Project();
            $newProject->fill($project);
            $newProject->save();
        }
    }
}
