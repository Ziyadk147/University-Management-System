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

    protected $user , $role;
    public function __construct(User $user , Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function getAllUsers()
    {
        return $this->user->all();
    }


    public function store($data)
    {
        $user = $this->user->create($data);
        $user->assignRole($data['role']);
        Image::create([
            'user_id' => $user->id,
            'image' => 'undraw_profile_1.svg',
        ]);
        return $user;
    }
    public function edit()
    {
        // TODO: Implement edit() method.
    }

    public function update($data , $img_payload , $id)
    {
        $user = $this->getUserById($id);
        $user->image()->update($img_payload);
        if($img_payload['image']){

        }
        return $user->update($data);

    }

    public function getUserById($id)
    {
        return $this->user->find($id);
    }
    public function getUserRoles($id)
    {
        return $this->user->find($id)->roles()->pluck('id')->first();

    }
    public function delete($id)
    {
        $user = $this->getUserById($id);
        $user->update(['deleted_by' => Auth::id()]);
        $user->delete();
    }

    public function getAllRoles()
    {
        return $this->role->all();
    }
}