<?php

use App\User;
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
        // factory(App\User::class, 100)->create();
        User::create([
        	'name' => 'Darwin Quiroz',
        	'email' => 'darquiroz@gmail.com',
        	'password' => bcrypt('quiroz'),
        	'remember_token' => str_random(10)
        ]);

        User::create([
        	'name' => 'Andy Delgado',
        	'email' => 'andy@gmail.com',
        	'password' => bcrypt('quiroz'),
        	'remember_token' => str_random(10)
        ]);

        User::create([
            'name' => 'Aline Delgado',
            'email' => 'aline@gmail.com',
            'password' => bcrypt('quiroz'),
            'remember_token' => str_random(10)
        ]);
    }
}
