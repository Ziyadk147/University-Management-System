<?php

namespace App\Http\Controllers;

use App\Http\Requests\Classes\ClassStoreValidationRequest;
use App\Models\Classes;
use App\Services\ClassesService;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    protected $classService;
    public function __construct(ClassesService $classesService)
    {
        $this->classService = $classesService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes =  $this->classService->getAllClasses();
        return view('pages.Classes.index',compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.Classes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClassStoreValidationRequest $request)
    {
        $payload['name'] = $request->name;
        $payload['capacity'] = $request->capacity;


        $this->classService->store($payload);

        return redirect(route('classes.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $class = $this->classService->getClassById($id);
        $payload['class'] = $class;
        $payload['courses'] = $class->Course;
        return view('pages.Classes.show' , $payload);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $class = $this->classService->getClassById($id);
        return view('pages.Classes.edit' , compact('class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClassStoreValidationRequest $request, $id)
    {
        $payload['name'] = $request->name;
        $payload['capacity'] = $request->capacity;

        $this->classService->update($payload , $id);

        return redirect(route('classes.index'));
    }

    public function viewClassStudents($id)
    {
        $students = $this->classService->getClassStudents($id);
        $class = $this->classService->getClassById($id);

        $payload = [
            'students' => $students,
            'class' => $class
        ];
        return view('pages.Classes.students' , $payload);
    }
    /**
     * Remove the specified resource from storage.

     */
    public function destroy($id)
    {
        $this->classService->destroy($id);

    }
}







