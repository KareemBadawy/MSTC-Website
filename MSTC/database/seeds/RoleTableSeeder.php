<?php

use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        	DB::table('roles')->insert(
            array(
                array('name' => 'President', 'label' => 'President'),
                array('name' => 'Head', 'label' => 'Head'),
                array('name' => 'ViceHead', 'label' => 'ViceHead'),
                array('name' => 'Member', 'label' => 'Member'),
                ));

        DB::table('permissions')->insert(
                array(
                    array('name' => 'Create-Task', 'label' => 'Create-Task'),
                    array('name' => 'Create-Vote', 'label' => 'Create-Vote'),
                    array('name' => 'Create-Event', 'label' => 'Create-Event'),
                    array('name' => 'Create-News', 'label' => 'Create-News'),
                    array('name' => 'Show-Sub', 'label' => 'Show-Sub'),
                    array('name' => 'Create-User', 'label' => 'Create-User'),
                    array('name' => 'Edit-Roles', 'label' => 'Edit-Roles'),
                    ));

        DB::table('users')->insert(
            array(
                array(
                    'username' => 'MSTCAlex',
                    'password' => Hash::make('test'),
                    'email' => 'mstc.alex.eng@outlook.com'
                    ),
                ));
        $admin = DB::table('users')->select('id')->where('username', 'MSTCAlex')->first()->id;
        Model::reguard();
    }
}
