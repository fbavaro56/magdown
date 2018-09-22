<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->call(LanguagesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(AdminSeeder::class);

        /**
         * Solo para testing
         */
//        $this->call(UsersTableSeeder::class);
//        $this->call(MagazinesTableSeeder::class);


    }
}
