<?php


namespace App\Services;

use App\Repositories\ResourcesRepository;

class ResourcesService {
    protected $resourceRepository;
    public function __construct(ResourcesRepository $resourceRepository)
    {
        $this->resourceRepository = $resourceRepository;
    }

    public function getAllCourses()
    {
        return $this->resourceRepository->getAllCourses();
    }

    public function getResources($id)
    {
        return $this->resourceRepository->getResource($id);
    }

}