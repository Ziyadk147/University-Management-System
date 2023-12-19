<?php

namespace App\Http\Controllers;

use App\Http\Requests\Courses\StoreValidationRequest;
use App\Http\Requests\Users\UserStorevalidationRequest;
use App\Http\Requests\Users\UserUpdateValidationRequest;
use App\Models\Image;
use App\Services\RoleService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function store(UserStorevalidationRequest $request)
    {

        $this->userService->store($request);
        return redirect(route('user.index'));
    }

    public function edit($id)
    {
        $user = $this->userService->getUserById($id);
        $roles = $this->userService->getAllRoles();
        $image = $this->userService->getUserImage($id);

        $payload= [
            'user' => $user,
            'roles' => $roles,
            'image' => $image
        ];
        return view("pages.Users.profile" , $payload);
    }

    public function update(Request $request , $id)
    {
        if($request->file('image')){

            $image = $this->userService->storeImage($request->file('image') , $id);

        }
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
