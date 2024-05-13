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
            // [
            //     'name' => 'Soro Ibrahim',
            //     'email' => 'ibsoro27@gmail.com',
            //     'password' => bcrypt('12345'),
            // ],

            // [
            //     'name' => 'Aviet Signo',
            //     'email' => 'briceline@gmail.com',
            //     'password' => bcrypt('12345'),
            // ],

            [
                'name' => 'Assemian Danielle',
                'email' => 'georgette.assemian@uvci.edu.ci ',
                'password' => bcrypt('12345'),
            ],

            [
                'name' => 'Ouattara Kader',
                'email' => 'khader.ouattara@uvci.edu.c ',
                'password' => bcrypt('Khader12345'),
            ],
            [
                'name' => 'MBia Hortense',
                'email' => 'deyolande.mbia@uvci.edu.ci ',
                'password' => bcrypt('Hortense12345'),
            ],

        ]);
    }
}
