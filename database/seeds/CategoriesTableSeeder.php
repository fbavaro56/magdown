<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'business & economics',
        ]);
        DB::table('categories')->insert([
            'name' => 'health',
        ]);
        DB::table('categories')->insert([
            'name' => 'Fashion',
        ]);
        DB::table('categories')->insert([
            'name' => 'food & cooking',
        ]);
        DB::table('categories')->insert([
            'name' => 'travel',
        ]);
        DB::table('categories')->insert([
            'name' => 'movies & music',
        ]);
        DB::table('categories')->insert([
            'name' => 'technology & computer',
        ]);
        DB::table('categories')->insert([
            'name' => 'sport & fitness',
        ]);
        DB::table('categories')->insert([
            'name' => 'science & history',
        ]);
        DB::table('categories')->insert([
            'name' => 'For men',
        ]);
        DB::table('categories')->insert([
            'name' => 'home & interior',
        ]);
        DB::table('categories')->insert([
            'name' => 'others',
        ]);
    }
}
