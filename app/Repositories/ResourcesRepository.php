<?php


namespace App\Repositories;


use App\Interfaces\ResourcesInterface;
use App\Models\Course;
use App\Models\Resource;
use Illuminate\Support\Facades\Auth;

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

    public function getSubjectResource($id)
    {
        $course_name = $this->courseRepository->getCourseById($id)->name;

        return $this->resource->where('tag' ,$course_name)->get();
    }

    public function findResourceById($id)
    {
        return $this->resource->find($id);
    }

    public function createResource($data)
    {
        return $this->resource->create($data);
    }

    public function delete($id)
    {
        $resource  =  $this->findResourceById($id);
        $resource->update(['deleted_by' => Auth::id()]);
        return $resource->delete();
    }
}