<?php

namespace App\Interfaces;

use App\Models\User;

interface UserInterface{

    public function getAllUsers();

    public function getUserById($id);

    public function getUserRoles($id);

    public function store($data);

    public function getUserImage($id);
    public function edit();
    public function update($data , $id);

    public function delete($id);


}