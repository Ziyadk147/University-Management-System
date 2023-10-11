<?php

namespace App\Interfaces;

interface RoleInterface {
    public function index();

    public function create();

    public function store($data);

    public function getRoleById($id);

    public function update($update , $id);

    public function delete($id);

}