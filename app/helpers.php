<?php

use Spatie\Permission\Models\Role;
function getRoleByName($role){

    return Role::where('name' , $role)->first();

}