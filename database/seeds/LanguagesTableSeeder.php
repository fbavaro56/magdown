<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            'name' => 'spanish',
        ]);

        DB::table('languages')->insert([
            'name' => 'english',
        ]);

        DB::table('languages')->insert([
            'name' => 'french',
        ]);
    }
}
