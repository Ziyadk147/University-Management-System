<?php


namespace App\Interfaces;

interface ClassesInterface{

    public function getAllClasses();

    public function create();
    public function store($request);

    public function getClassById($id);

    public function getClassStudents($id);
    public function update($request , $id);

    public function delete($id);

}