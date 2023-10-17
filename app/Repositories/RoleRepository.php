<?php


namespace App\Repositories;

use App\Interfaces\RoleInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
        $deleted_role = $this->role->findOrFail($id);
        $deleted_role->update([
            'updated_by' => Auth::id()
        ]);
        return $deleted_role->delete();
    }

    public function getUsers()
    {
        return $this->user->all();
    }
}