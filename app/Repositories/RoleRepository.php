<?php


namespace App\Repositories;

use App\Interfaces\RoleInterface;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class RoleRepository implements  RoleInterface{

    protected $role;
    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function getAllRoles()
    {
        return Role::all();
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
        $deleted_role = $this->role->findOrFail($id);
        $deleted_role->update([
            'updated_by' => Auth::id()
        ]);
        return $deleted_role->delete();
    }
}