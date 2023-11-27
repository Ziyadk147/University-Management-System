<?php


namespace App\Interfaces;

interface ResourcesInterface {
    public function getAllCourses();

    public function getResource($id);
}