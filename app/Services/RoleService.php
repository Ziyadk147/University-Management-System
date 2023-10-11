<?php


namespace App\Services;

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
}