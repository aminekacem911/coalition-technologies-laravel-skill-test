<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->delete();
        $tasksRecords = [
            [

                'name' => 'meeting',
                'priority' => 5,
                'project_id' => 1
            ], [

                'name' => 'architecture DB',
                'priority' => 6,
                'project_id' => 1
            ], [

                'name' => 'develop auth module ',
                'priority' => 2,

            ], [

                'name' => 'develop cruds',
                'priority' => 1,
                'project_id' => 1
            ], [

                'name' => 'deploy',
                'priority' => 4,
                'project_id' => 3
            ], [

                'name' => 'styling front page',
                'priority' => 3,
                'project_id' => 4
            ]
        ];

        foreach ($tasksRecords as  $record) {
            Task::create($record);
        }
    }
}
