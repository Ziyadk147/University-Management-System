<?php


namespace App\Services;

use App\Repositories\CourseRepository;

class CourseService{
    protected $courseRepository;

    public function __construct(CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    public function getAllCourses()
    {
        return $this->courseRepository->getAllCourses();
    }

    public function store($request)
    {
        return $this->courseRepository->store($request);
    }

    public function getCourseById($id)
    {
        return $this->courseRepository->getCourseById($id);
    }

    public function update($request,$id)
    {
        return $this->courseRepository->update($request,$id);
    }

    public function delete($id)
    {
        return $this->courseRepository->delete($id);
    }

}