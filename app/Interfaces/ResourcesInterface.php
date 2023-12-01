<?php


namespace App\Interfaces;

interface ResourcesInterface {
    public function getAllCourses();

    public function getSubjectResource($id);

    public function findResourceById($id);
    public function delete($id);
}