<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\Image;
use App\Models\User;
use App\Services\RoleService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserRepository implements UserInterface{

    protected $user , $role ,$image;
    public function __construct(User $user , Role $role , Image $image)
    {
        $this->user = $user;
        $this->role = $role;
        $this->image = $image;
    }

    public function getAllUsers()
    {
        return $this->user->all();
    }


    public function store($data)
    {

        $user = $this->user->create($data);
        $user->assignRole($data['role']);

        $img_payload = [
            'user_id' => $user->id,
            'images' => $data['image']
        ];
        $image = $this->storeImage($img_payload);
        return $user;
    }
    public function edit()
    {
        // TODO: Implement edit() method.
    }

    public function update($data , $id)
    {

        $user = $this->user->find($id);

        $img_payload = [
            'user_id' => $id,
            'images' => $data['image'],
        ];

        $this->storeImage($img_payload);
        return $user->update($data);

    }

    public function storeImage($payload)
    {
        $already_exists_image_name = $this->getUserImage($payload['user_id']);
        if($already_exists_image_name){
           $already_exists = $this->image->where('images' ,$already_exists_image_name);
           $already_exists->update($payload);
        }
        else{
            return $this->storeImage($payload);
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
    }

    public function getAllRoles()
    {
        return $this->role->all();
    }
}