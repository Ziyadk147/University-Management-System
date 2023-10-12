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

    public function index()
    {
        return $this->rolerepository->index();
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
}