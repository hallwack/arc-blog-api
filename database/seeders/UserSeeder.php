<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insert = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin'),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Raihan Adam',
                'email' => 'adam@admin.com',
                'password' => bcrypt('raihanadam'),
                'created_at' => Carbon::now(),
            ]
        ];

        User::insert($insert);
    }
}
