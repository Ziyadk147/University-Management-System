<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Services\RoleService;

class RoleController extends Controller
{
    protected $roleService;
    protected $userService;
    public function __construct(RoleService $roleService , UserService $userService)
    {
        $this->roleService = $roleService;
        $this->userService = $userService;

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $roles = $this->roleService->getAllRoles();
        return view('pages.Roles and Permission.Roles.role-index' ,compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.Roles and Permission.Roles.role-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string'
        ]);

        $user = $this->roleService->store($data);

        return redirect(route('role.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = $this->roleService->getRoleById($id);
        return view('pages.Roles and Permission.Roles.role-edit' , compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = $this->roleService->update($request , $id);
        return to_route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->roleService->delete($id);
        return response()->json('Role Deleted Successfully');
    }

    public function bindUserPage()
    {
        $roles = $this->roleService->getAllRoles();
        $users = $this->roleService->getUsers();

        return view('pages.Roles and Permission.Roles.role-bind',compact('roles' , 'users'));
    }

    public function bindRoleToUser(Request $request)
    {
        $role = $this->roleService->getRoleById($request->role);
        $user = $this->userService->getUserById($request->user);
        $this->roleService->bindRoleToUser($role , $user);
        return redirect(route('role.index'));
    }
}
