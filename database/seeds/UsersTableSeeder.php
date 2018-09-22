<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'rol' => 1,
            'password' => bcrypt('admin'),
            'remember_token' => str_random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Francisco Bavaro',
            'email' => 'fbavaro56@gmail.com',
            'password' => bcrypt('acm1pt'),
            'remember_token' => str_random(10),
        ]);

        factory(App\User::class, 10)->create();
    }
}
