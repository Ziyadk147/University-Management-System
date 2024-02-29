<?php

namespace App\Http\Controllers;

use App\Http\Requests\Courses\StoreValidationRequest;
use App\Http\Requests\Users\UserStorevalidationRequest;
use App\Http\Requests\Users\UserUpdateValidationRequest;
use App\Models\Image;
use App\Services\ClassesService;
use App\Services\RoleService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $userService , $roleservice , $classesService;
    public function __construct(UserService $userService , RoleService $roleService,ClassesService $classesService)
    {
        $this->userService = $userService;
        $this->classesService = $classesService;
    }

    public function index()
    {
        $users = $this->userService->getAllUsers();
        return view('pages.Users.index' , compact('users'));
    }

    public function create()
    {
        $roles = $this->userService->getAllRoles();
        $classes = $this->classesService->getAllClasses();

        $payload['roles'] = $roles;
        $payload["classes"] = $classes;

        return view('pages.Users.create' ,$payload);
    }

    public function store(UserStorevalidationRequest $request)
    {
        $payload = [
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'role' =>  $request->role,
            'class' => $request->class,
        ];

        $errors = $this->userService->store($payload);
        return redirect(route('user.index'))->withErrors(['errors' => $errors]);
    }

    public function edit($id)
    {
        $user = $this->userService->getUserById($id);
        $roles = $this->userService->getAllRoles();
        $image = $this->userService->getUserImage($id);
        $classes = $this->classesService->getAllClasses();

        $payload= [
            'user' => $user,
            'roles' => $roles,
            'image' => $image,
            'classes' => $classes
        ];
        return view("pages.Users.profile" , $payload);
    }

    public function update(Request $request , $id)
    {
        if($request->file('image')){

            $image = $this->userService->storeImage($request->file('image'));

        }
        if($request->class){
            $class = $request->class;
        }
        $payload = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'image' => $image ?? null,
            'class_id' => $class ?? null
        ];

        $data = $this->userService->update($payload , $id);

            return redirect(route('user.index'))->withErrors($data);
    }


    public function destroy($id)
    {
        $this->userService->destroy($id);
    }
}
