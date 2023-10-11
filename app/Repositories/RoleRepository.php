<?php


namespace App\Repositories;

use App\Interfaces\RoleInterface;
use Spatie\Permission\Models\Role;

class RoleRepository implements  RoleInterface{

    protected $role;
    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function index()
    {
        return Role::all();
    }
    public function create()
    {
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
        return $this->role->find($id)->delete();
    }
}