<?php


namespace App\Repositories;


use App\Interfaces\CourseInterface;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class CourseRepository implements CourseInterface{

    protected $course;

    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    public function getAllCourses()
    {
        return $this->course->all();
    }
    public function store($data)
    {
        return $this->course->create($data);
    }
    public function getCourseById($id)
    {
        return $this->course->find($id);
    }
    public function update($request, $id)
    {
        $course = $this->getCourseById($id);
        $course->update($request);
    }

    public function delete($id)
    {
        $course =  $this->getCourseById($id);
        $course->update([
            'deleted_by' => Auth::id()
        ]);
        return $course->delete();
    }
}