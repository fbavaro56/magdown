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
            'name' => 'auto',
        ]);
        DB::table('categories')->insert([
            'name' => 'moto',
        ]);
        DB::table('categories')->insert([
            'name' => 'health',
        ]);
        DB::table('categories')->insert([
            'name' => 'women',
        ]);
        DB::table('categories')->insert([
            'name' => 'men',
        ]);
        DB::table('categories')->insert([
            'name' => 'kids',
        ]);
        DB::table('categories')->insert([
            'name' => 'adult',
        ]);
    }
}
