<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\Image;
use App\Models\User;
use App\Services\ClassesService;
use App\Services\RoleService;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;
class UserRepository implements UserInterface{

    protected $user , $role ,$image , $roleRepository , $classesService;
    public function __construct(User $user , Role $role , Image $image ,RoleRepository $roleRepository , ClassesService $classesService)
    {
        $this->user = $user;
        $this->role = $role;
        $this->image = $image;
        $this->roleRepository = $roleRepository;
        $this->classesService = $classesService;
    }

    public function getAllUsers()
    {
        return $this->user->all();
    }


    public function store($data)
    {
        try {
            DB::transaction(function () use ($data){
                $user = $this->user->create($data);
                $user->assignRole($data['role']);

                // No need to fetch role name; use assigned role directly
                $role = $user->roles->first()->name; // Assuming roles are loaded using with()

                $class = $data['class'];

                if ($role === 'student') {
                    $studentPayload = [
                        'class' => $class,
                        'user' => $user
                    ];
                    $student = $this->setStudentClass($studentPayload);
                    if(!$student){
                        throw new Exception("Class is Full");
                    }
                }
            });

        }
        catch (Exception $exception){
            DB::rollBack();
            return $exception->getMessage();
        };

    }

    public function setStudentClass($payload)
    {
        $class = $payload['class'];
        $user = $payload['user'];

        $remainingSeats = $this->classesService->getClassRemainingSeats($class);
            if($remainingSeats > 0){
                if($user->Student()->where('class_id' , $class)->get()){
                    $student = $user->Student()->update(['class_id' => $class]);
                }else{
                    $student = $user->Student()->create(['class_id' => $class]);
                }
                return $student;
            }
    }

    public function edit()
    {
        // TODO: Implement edit() method.
    }

    public function update($data , $id)
    {

        try{
            DB::transaction(function () use ($data , $id){
                $user = $this->user->find($id);
                $role = $this->roleRepository->getRoleById($data['role'])->name;

                if(isset($data['image'])){
                    $img_payload = [
                        'user_id' => $id,
                        'images' => $data['image'],
                    ];
                    if(!$this->storeImage($img_payload)){
                        throw new Exception("Error Storing Image");
                    };
                }

                if($role == 'student'){

                    $class = $data['class_id'];

                    $studentPayload = [
                        'class' => $class,
                        'user' => $user
                    ];

                    $student = $this->setStudentClass($studentPayload);

                    if(!$student){
                        throw new Exception("Class is Full");
                    }

                }
                else if($role == "teacher" || $role == "admin"){

                    if($user->Student()){

                        $user->Student()->delete();

                    }
                }
            });
        }
        catch (Exception $exception){
            DB::rollBack();
            return $exception->getMessage();
        }
    }

    public function storeImage($payload)
    {
        $already_exists_image_name = $this->getUserImage($payload['user_id']);
        if(isset($already_exists_image_name)){


            $already_exists = $this->image->where('images' ,$already_exists_image_name)->update($payload);


        }
        else{
            Image::create($payload);
        }
    }

    public function getUserById($id)
    {
        return $this->user->find($id);
    }
    public function getUserRoles($id)
    {
        return $this->user->find($id)->roles()->pluck('id')->first();

    }

    public function getUserImage($id)
    {
        return $this->image->where('user_id' , $id)->value('images');
    }
    public function delete($id)
    {
        $user = $this->user->find($id);
        $user->update(['deleted_by' => Auth::id()]);
        $user->delete();
        $role = $this->roleRepository->getRoleById($user->role)->name;
        if($role == 'student'){
            $user->Student()->delete();


        }
    }

    public function getAllRoles()
    {
        return $this->role->all();
    }

}