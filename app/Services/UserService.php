<?php

namespace App\Services;


use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserService{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers()
    {
        return $this->userRepository->getAllUsers();
    }

    public function getAllRoles()
    {
        return $this->userRepository->getALlRoles();
    }

    public function store($data)
    {
        $payload = [
            'name' => $data->name,
            'password' => Hash::make($data->password),
            'email' => $data->email,
            'role' =>$data->role,
             ];


        return $this->userRepository->store($payload);
    }

    public function update($data , $id)
    {
        $file = $data->file('image');

        $path = $this->storeImage($file);

        $payload = [
            'name' => $data->name,
            'password' => Hash::make($data->password),
            'email' => $data->email,
            'role' =>$data->role,
            'image' => $path ?? null
        ];
//        dd($payload);
        return $this->userRepository->update($payload , $id);
    }

    public function getUserById($id)
    {
        return $this->userRepository->getUserById($id);
    }

    public function getUserRoles($id)
    {
        return $this->userRepository->getUserRoles($id);
    }

    public function storeImage($file)
    {
        $extension = $file->getClientOriginalExtension();
        $filename = pathinfo($extension , PATHINFO_FILENAME);
        $storageName = $filename . '_' . time() . '.' . $extension;
        $path = $file->storeAs('images' ,$storageName,'public');

        return $storageName;
    }

    public function destroy($id)
    {
        return $this->userRepository->delete($id);
    }
}
