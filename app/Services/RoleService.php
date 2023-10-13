<?php


namespace App\Services;

use App\Http\Requests\NamevalidationRequest;
use App\Repositories\RoleRepository;

class RoleService{

    protected $rolerepository;
    public function __construct(RoleRepository $roleRepository)
    {
        $this->rolerepository = $roleRepository;
    }

    public function getAllRoles()
    {
        return $this->rolerepository->getAllRoles();
    }

    public function store($data)
    {
        return $this->rolerepository->store($data);
    }

    public function getRoleById($data)
    {
        return $this->rolerepository->getRoleById($data);
    }

    public function update($data ,$id)
    {
        return $this->rolerepository->update($data , $id);
    }

    public function delete($id)
    {
        return $this->rolerepository->delete($id);
    }

    public function getUsers()
    {
        return $this->rolerepository->getUsers();
    }
}