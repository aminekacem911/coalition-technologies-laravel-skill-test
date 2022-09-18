<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->delete();
        $projectRecords = [
            [
                'name' => 'Ecommerce website',
            ], [

                'name' => 'Restaurant website ',
            ], [

                'name' => 'Ticketing system',
            ], [

                'name' => 'streaming platform',
            ]
        ];

        foreach ($projectRecords as  $record) {
            Project::create($record);
        }
    }
}
