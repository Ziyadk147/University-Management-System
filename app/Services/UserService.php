<?php

namespace App\Services;


use App\Repositories\UserRepository;

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

        return $this->userRepository->store($data);
    }

    public function update($data , $id)
    {

        return $this->userRepository->update($data , $id);
    }

    public function getUserById($id)
    {
        return $this->userRepository->getUserById($id);
    }

    public function getUserImage($id)
    {
        return $this->userRepository->getUserImage($id);
    }

    public function getUserRoles($id)
    {
        return $this->userRepository->getUserRoles($id);
    }

    public function destroy($id)
    {
        return $this->userRepository->delete($id);
    }
}
