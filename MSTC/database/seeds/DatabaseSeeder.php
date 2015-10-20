<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        //factory('App\User',20)->create();
        factory('App\Question',30)->create();
        factory('App\Choice',10)->create();

        Model::reguard();
    }
}
