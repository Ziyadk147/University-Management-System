<?php

namespace App\Http\Controllers;

use App\Http\Requests\Courses\CourseStoreValidationRequest;
use App\Models\Course;
use App\Services\CourseService;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    protected $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = $this->courseService->getAllCourses();
        return view('pages.Courses.index' , compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.Courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseStoreValidationRequest $request)
    {
        $payload['name'] = $request->name;
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
        return view('pages.Courses.edit' , compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseStoreValidationRequest $request , $id)
    {
        $payload['name'] = $request->name;
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
