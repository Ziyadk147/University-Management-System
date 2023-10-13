<?php

namespace App\Http\Controllers;
use App\Services\PermissionService;
use App\Services\RoleService;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class PermissionController extends Controller
{
    private $permissionService;
    private $roleService;

    public function __construct(PermissionService $permissionService , RoleService $roleService)
    {
        $this->permissionService = $permissionService;
        $this->roleService = $roleService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = $this->permissionService->getAllPermissions();
        return view('pages.Roles and Permission.Permissions.permission-index' , compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.Roles and Permission.Permissions.permission-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $permission = $this->permissionService->store($request);
        return to_route('permission.index');
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
        $permission = $this->permissionService->getPermissionById($id);
        return view('pages.Roles and Permission.Permissions.permission-edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $permission = $this->permissionService->update($request , $id);
        return to_route('permission.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permission = $this->permissionService->delete($id);
        return response()->json('done');
    }

    public function bindPermissionPage()
    {
        $permissions = $this->permissionService->getAllPermissions();
        $roles = $this->roleService->getAllRoles();

        return view('pages.Roles and Permission.Permissions.permission-bind' , compact('permissions' ,'roles'));
    }

    public function bindPermissionToRole(Request $request)
    {
        $role = $this->roleService->getRoleById($request->role);
        $permissions = array_values($request->selected_permission ?? []);

        $this->permissionService->assignPermissionToRole($role , $permissions);
        return redirect(route('permission.bind'));
    }

    public function getRolePermissions(Request $request)
    {
        $role = $this->roleService->getRoleById($request->id);
        $permissions = $this->permissionService->getRolePermissions($role);

        return response()->json([
            'data' => $permissions,
            'message' => 'Permissions Returned Successfully'
        ]);
    }
}
