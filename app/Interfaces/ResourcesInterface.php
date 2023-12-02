<?php


namespace App\Interfaces;

interface ResourcesInterface {
    public function getAllCourses();

    public function getSubjectResource($id);

    public function createResource($data);

    public function updateResource($already_exists , $payload);
    public function findResourceById($id);
    public function delete($id);
}