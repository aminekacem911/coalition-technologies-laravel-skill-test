<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $userRecords = [
            [
                'id' => 1,
                'name' => 'amine kacem',
                'email' => 'admin@admin.com',
                'password' => Hash::make('password'),
            ]
        ];

        foreach ($userRecords as  $record) {
            $user = User::create($record);
        }
    }
}
