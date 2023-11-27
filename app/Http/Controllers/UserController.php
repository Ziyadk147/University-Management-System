<?php

namespace App\Http\Controllers;

use App\Http\Requests\Courses\StoreValidationRequest;
use App\Services\RoleService;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService , $roleservice;
    public function __construct(UserService $userService , RoleService $roleService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getAllUsers();


        return view('pages.Users.index' , compact('users'));
    }

    public function create()
    {
        $roles = $this->userService->getAllRoles();
        return view('pages.Users.create' , compact('roles'));
    }

    public function store(StoreValidationRequest $request)
    {
        $request = $request->validated();
        $this->userService->store($request);
        return redirect(route('user.index'));
    }

    public function edit($id)
    {
        $user = $this->userService->getUserById($id);
        $roles = $this->userService->getAllRoles();
        $payload['user'] = $user;
        $payload['roles'] = $roles;
        return view('pages.Users.edit' , $payload);
    }

    public function update(Request $request , $id)
    {
        $payload = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ];
        $data = $this->userService->update($payload , $id);
        return redirect(route('user.index'));
    }

    public function destroy($id)
    {
        $this->userService->destroy($id);
    }
}
