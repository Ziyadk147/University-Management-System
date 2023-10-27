<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
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
        $payload = [
            'name' => $data->name,
            'password' => Hash::make($data->password),
            'email' => $data->email,
            'role' =>$data->role
        ];

        $user = $this->user->create($payload);
        $user->assignRole($payload['role']);

        return $user;
    }
    public function edit()
    {
        // TODO: Implement edit() method.
    }

    public function update($data , $id)
    {
        $user = $this->user->find($id);

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
        $user = $this->user->find($id);
        $user->update(['deleted_by' => Auth::id()]);
        $user->delete();
    }

    public function getAllRoles()
    {
        return $this->role->all();
    }
}