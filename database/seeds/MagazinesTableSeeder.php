<?php

use Illuminate\Database\Seeder;

class MagazinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Magazine::class, 1000)->create();
    }
}
