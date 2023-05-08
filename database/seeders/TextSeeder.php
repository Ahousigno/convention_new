<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TextSeeder extends Seeder
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
                'name' => 'Aviet Signo',
                'email' => 'briceline03aout@gmail.com',
                'password' => bcrypt('12345'),
            ],

        ]);
    }
}
