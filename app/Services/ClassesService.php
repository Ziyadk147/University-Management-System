<?php

namespace App\Services;

use App\Repositories\ClassesRepository;

class ClassesService{

    protected $classRepository;

    public function __construct(ClassesRepository $classRepository)
    {
        $this->classRepository = $classRepository;
    }

    public function getAllClasses()
    {
        return $this->classRepository->getAllClasses();
    }


    public function store($data)
    {
        return $this->classRepository->store($data);
    }

    public function getClassById($id)
    {
        return $this->classRepository->getClassById($id);
    }
    public function update($data ,$id)
    {
        return $this->classRepository->update($data , $id);
    }
    public function destroy($id)
    {
        return $this->classRepository->delete($id);
    }

}