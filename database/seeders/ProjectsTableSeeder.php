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
            $newProject->name = $project["name"];
            $newProject->description = $project["description"];
            $newProject->url = $project["url"];
            $newProject->image = $project["image"];
            $newProject->save();
        }
    }
}
