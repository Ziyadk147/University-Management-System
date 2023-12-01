<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use App\Services\ResourcesService;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Storage;

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
        $courses = $this->resourceService->getAllCourses();
        return view('pages.Resources.create' , compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->resourceService->createResource($request);
        return redirect(route('resource.index'));
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $resources = $this->resourceService->getSubjectResources($id);
        return view('pages.Resources.show',compact('resources'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $payload['resource'] =  $this->resourceService->findResourceById($id);
        $payload['courses'] =  $this->resourceService->getAllCourses();
        return view('pages.Resources.edit' , $payload);
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
    public function destroy($id)
    {
        return $this->resourceService->destroy($id);
    }

    public function downloadResource($filename)
    {
        $path = Storage::disk('public')->path('files/'.$filename);
        return response()->file($path);
    }
}
