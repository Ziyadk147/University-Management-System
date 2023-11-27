<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use App\Services\ResourcesService;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    protected $resourceService;
    public function __construct(ResourcesService $resourceService)
    {
        $this->resourceService = $resourceService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $courses = $this->resourceService->getAllCourses();
        return view('pages.Resources.index',compact('courses'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = $this->resourceService->getResources($id);
//        dd($data);
        return view('pages.Resources.resources' , compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resource $resource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resource $resource)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resource $resource)
    {
        //
    }
}
