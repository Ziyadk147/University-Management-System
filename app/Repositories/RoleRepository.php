<?php


namespace App\Repositories;

use App\Interfaces\RoleInterface;
use Spatie\Permission\Models\Role;

class RoleRepository implements  RoleInterface{
    public function index()
    {
        return Role::all();
    }
    public function create()
    {
        // TODO: Implement create() method.
    }

    public function store($request)
    {
        // TODO: Implement store() method.
    }
    public function edit($id)
    {
        // TODO: Implement edit() method.
    }
    public function update($id)
    {
        // TODO: Implement update() method.
    }
    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}