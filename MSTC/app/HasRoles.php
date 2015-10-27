<?php

namespace App;

trait HasRoles
{

	public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function assignRole($role)
    {
        $this->roles()->sync(
            Role::whereName($role)->firstOrFail()
        );
    }

    public function hasRole($role)
    {
        if(is_string($role)){
            return $this->roles->contains('name', $role);
        }


        return !! $role->intersect($this->roles)->count();
    }


    /* Get Array of users with the sent Role */
    public static function WithMainRole($role)
    {
        $users = array();
        foreach (User::all() as $user) {
            if($user->roles->first()->name == $role)
                $users[] = $user->username;
        }

        return $users;
    }

}