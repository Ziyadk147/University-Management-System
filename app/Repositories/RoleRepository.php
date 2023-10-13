<?php


namespace App\Repositories;

use App\Interfaces\RoleInterface;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RoleRepository implements  RoleInterface{

    protected $role;
    protected $user;
    public function __construct(Role $role,User $user)
    {
        $this->role = $role;
        $this->user = $user;
    }

    public function getAllRoles()
    {
        return $this->role->all();
    }
    public function store($data)
    {
        return $this->role->create($data);
    }
    public function getRoleById($id)
    {
        return $this->role->find($id);
    }
    public function update($data, $id)
    {
        return $this->role->find($id)->update($data);

    }
    public function delete($id)
    {
        return $this->role->findOrFail($id)->delete();
    }

    public function getUsers()
    {
        return $this->user->all();
    }
}