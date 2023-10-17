<?php

namespace App\Repositories;

use App\Interfaces\PermissionInterface;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class PermissionRepository implements PermissionInterface{

    private $permission;
    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    public function getAllPermissions()
    {
        return $this->permission->all();
    }
    public function create()
    {
    }

    public function store($data)
    {
        return $this->permission->create($data);
    }
    public function getPermissionById($id)
    {
        return $this->permission->findOrFail($id);
    }
    public function update($data, $id)
    {
        return $this->permission->findOrFail($id)->update($data);
    }
    public function delete($id)
    {
        $deleted_permission =  $this->permission->findOrFail($id);
        $deleted_permission->update([
            'deleted_by' => Auth::id()
        ]);
        return $deleted_permission->delete();
    }
    public function assignPermissionToRole($role , $permission)
    {
        $role->syncPermissions($permission);
    }
    public function getRolePermissions($role)
    {
        return $role->permissions->pluck('id');
    }
}