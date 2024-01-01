<?php

namespace App\Http\Controllers;

use App\Http\Requests\Courses\CourseStoreValidationRequest;
use App\Models\Course;
use App\Services\ClassesService;
use App\Services\CourseService;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    protected $courseService , $classesService;

    public function __construct(CourseService $courseService , ClassesService $classesService)
    {
        $this->courseService = $courseService;
        $this->classesService = $classesService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = $this->courseService->getAllCourses();

        $payload['courses'] = $courses;

        return view('pages.Courses.index' ,$payload);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = $this->classesService->getAllClasses();
        $payload['classes'] = $classes;

        return view('pages.Courses.create',$payload);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseStoreValidationRequest $request)
    {
        $payload['name'] = $request->name;
        $payload['class_id'] = $request->class;
        $this->courseService->store($payload);

        return redirect(route('courses.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $courses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $course = $this->courseService->getCourseById($id);
        $classes = $this->classesService->getAllClasses();

        $payload['course'] = $course;
        $payload['classes'] = $classes;

        return view('pages.Courses.edit' , $payload);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseStoreValidationRequest $request , $id)
    {
        $payload['name'] = $request->name;
        $payload['class_id'] = $request->class;
        $this->courseService->update($payload,$id);
        return redirect(route('courses.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->courseService->delete($id);
    }
}
