<?php

namespace App\Interfaces;

interface CourseInterface{

    public function getAllCourses();

    public function store($data);
    public function getCourseById($id);

    public function update($request , $id);

    public function delete($id);



}