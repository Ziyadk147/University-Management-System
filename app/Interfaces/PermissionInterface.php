<?php


namespace  App\Interfaces;

interface PermissionInterface{
    public function getAllPermissions();
    public function create();
    public function store($data);
    public function getPermissionById($id);
    public function update($data , $id);
    public function delete($id);
}