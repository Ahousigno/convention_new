<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            [
                'name' => 'Soro Ibrahim',
                'email' => 'ibsoro27@gmail.com',
                'password' => bcrypt('12345'),
            ],

        ]);
    }
}
