<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'ADMIN NAME',
            'email' => 'admin@admin.com',
            'rol' => 1,
            'password' => bcrypt('admin'),
            'remember_token' => str_random(10),
        ]);
    }
}
