<?php


namespace App\Interfaces;

interface ClassesInterface{

    public function getAllData();

    public function create();
    public function store($request);

    public function getClassById($id);

    public function update($request , $id);

    public function delete($id);

}