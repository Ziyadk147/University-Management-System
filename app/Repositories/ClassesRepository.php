<?php


namespace App\Repositories;

use App\Interfaces\ClassesInterface;
use App\Models\Classes;
use Illuminate\Support\Facades\Auth;

class ClassesRepository implements ClassesInterface{

    protected  $class;
    public function __construct(Classes $class)
    {
        $this->class = $class;
    }

    public function getAllClasses()
    {
        return $this->class->all();
    }
    public function create()
    {
        // TODO: Implement create() method.
    }
    public function store($request)
    {
        return $this->class->create($request);
    }
    public function getClassById($id)
    {
        return $this->class->find($id);
    }
    public function update($request, $id)
    {
        $class = $this->class->find($id);
        return $class->update($request);

    }
    public function delete($id)
    {
        $class = $this->class->find($id);
        $class->update([
            'deleted_by' => Auth::id()
        ]);
        $class->Course()->delete();
        return $class->delete();
    }

}