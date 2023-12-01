<?php


namespace App\Services;

use App\Repositories\CourseRepository;
use App\Repositories\ResourcesRepository;
use \Illuminate\Http\Request;

class ResourcesService {
    protected $resourceRepository , $courseRepository;
    public function __construct(ResourcesRepository $resourceRepository,CourseRepository $courseRepository)
    {
        $this->resourceRepository = $resourceRepository;
        $this->courseRepository = $courseRepository;
    }

    public function getAllCourses()
    {
        return $this->resourceRepository->getAllCourses();
    }

    public function getSubjectResources($id)
    {
        return $this->resourceRepository->getSubjectResource($id);
    }

    public function findResourceById($id)
    {
        return $this->resourceRepository->findResourceById($id);
    }

    public function createResource(Request $request)
    {
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();

        $filename = pathinfo($extension , PATHINFO_FILENAME);
        $storageName = $filename . '_' . time() . '.'.$extension;
        $path = $file->storeAs('files' , $storageName , 'public');

        $data['name'] = $request->name;
        $data['tag'] = $this->courseRepository->getCourseById($request->course)->name;
        $data['path'] = $storageName;

        return $this->resourceRepository->createResource($data);
    }

    public function destroy($id)
    {
        return $this->resourceRepository->delete($id);
    }

}