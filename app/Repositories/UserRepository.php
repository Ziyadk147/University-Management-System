<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\Image;
use App\Models\User;
use App\Services\RoleService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserRepository implements UserInterface{

    protected $user , $role ,$image , $roleRepository;
    public function __construct(User $user , Role $role , Image $image ,RoleRepository $roleRepository)
    {
        $this->user = $user;
        $this->role = $role;
        $this->image = $image;
        $this->roleRepository = $roleRepository;
    }

    public function getAllUsers()
    {
        return $this->user->all();
    }


    public function store($data)
    {

            $user = $this->user->create($data);
            $user->assignRole($data['role']);
            $role = $this->roleRepository->getRoleById($data['role'])->name;
            $class = $data['class'];
            if($role == 'student'){
                $user->Student()->create([
                    'class_id' => $class,
                ]);
            }

        return $user;

    }
    public function edit()
    {
        // TODO: Implement edit() method.
    }

    public function update($data , $id)
    {

        $user = $this->user->find($id);
        $role = $this->roleRepository->getRoleById($data['role'])->name;

//        dd($data);
        if(isset($data['image'])){
            $img_payload = [

                'user_id' => $id,
                'images' => $data['image'],

            ];
//            dd($img_payload);
            $this->storeImage($img_payload);
        }

        if($role == 'student'){

            $class = $data['class_id'];

            $user->Student()->update([

                'class_id' => $class,

            ]);
        }
    else if($role == "teacher" || $role == "admin"){
            if($user->Student()){
                $user->Student()->delete();
            }

        }


        return $user->update($data);

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