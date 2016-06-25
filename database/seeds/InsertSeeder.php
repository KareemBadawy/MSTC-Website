<?php

use Illuminate\Database\Seeder;

class InsertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = DB::table('roles')->select('id')->where('label', 'President')->first()->id;
        $role = Role::findorfail($id);
        $role->permissions()->attach(['7']);
        $id = DB::table('roles')->select('id')->where('label', 'Head')->first()->id;
        $role = Role::findorfail($id);
        $role->permissions()->attach(['6']);
        $id = DB::table('roles')->select('id')->where('label', 'ViceHead')->first()->id;
        $role = Role::findorfail($id);
        $role->permissions()->attach(['1','2','3','4','5']);

        DB::table('users')->insert(
            array(
                array(
                    'username' => 'MSTCAlex',
                    'password' => Hash::make('tester'),
                    'email' => 'mstc.alex.eng@outlook.com'
                    ),
                ));
        $id = DB::table('users')->select('id')->where('username', 'MSTCAlex')->first()->id;
        $admin = User::findorfail($id);
        $admin->verticals()->attach(['1','2','3','4']);
        $admin->roles()->attach(['1','2','3','4']);
        Model::reguard();
    }
}
