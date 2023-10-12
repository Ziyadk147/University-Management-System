<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RoleService;

class RoleController extends Controller
{
    protected $roleService;
    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = $this->roleService->index();
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
}
