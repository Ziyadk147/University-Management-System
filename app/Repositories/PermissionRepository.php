<?php

namespace App\Repositories;

use App\Interfaces\PermissionInterface;
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
        return $this->permission->findOrFail($id)->delete();
    }
}