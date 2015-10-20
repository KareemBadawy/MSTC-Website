<?php

use App\Vertical;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class VerticalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * will fill the database with verticals
     * @return void
     */
    // to run this seeder 
    // php artisan db:seed --class=VerticalTableSeeder
    public function run()
    {
        Model::unguard();
        	DB::table('verticals')->insert([
            'name' => "Technical",
       		]);
       		DB::table('verticals')->insert([
            'name' => "Media & Marketing",
       		]);
       		DB::table('verticals')->insert([
            'name' => "H.R.",
       		]);
       		DB::table('verticals')->insert([
            'name' => "Operations",
       		]);
        Model::reguard();
    }
}
