<?php

namespace App\Services;

use App\Http\Requests\NamevalidationRequest;
use App\Repositories\PermissionRepository;
use Faker\Guesser\Name;

class PermissionService{

    private $permissionRepository;
    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function getAllPermissions()
    {
        return $this->permissionRepository->getAllPermissions();
    }

    public function store( $data)
    {
        $data = $data->validate([
            'name' => 'Required|string'
        ]);
        return $this->permissionRepository->store($data);
    }

    public function getPermissionById($id)
    {
        return $this->permissionRepository->getPermissionById($id);
    }

    public function update($data , $id)
    {
        $data = $data->validate([
            'name' => 'Required|string'
        ]);
        return $this->permissionRepository->update($data , $id);
    }

    public function delete($id)
    {
        return $this->permissionRepository->delete($id);
    }
}