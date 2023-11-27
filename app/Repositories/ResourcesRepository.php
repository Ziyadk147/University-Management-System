<?php


namespace App\Repositories;


use App\Interfaces\ResourcesInterface;
use App\Models\Course;
use App\Models\Resource;

class ResourcesRepository implements ResourcesInterface {
    protected $resource;
    protected $courseRepository;
    public function __construct(Resource $resource , CourseRepository $courseRepository)
    {
        $this->resource = $resource;
        $this->courseRepository = $courseRepository;
    }

    public function getAllCourses()
    {
        return $this->courseRepository->getAllCourses();
    }

    public function getResource($id)
    {
        $course_name = $this->courseRepository->getCourseById($id)->name;

        return $this->resource->where('tag' ,$course_name)->get();
    }
    
}