<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

// Add this line to import the Validator class

class RoleController extends Controller
{
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function __construct()
    {

        $this->middleware('permission:', ['only' => ['index', 'store']]);
        $this->middleware('permission:', ['only' => ['create', 'store']]);
        $this->middleware('permission:add role|edit role', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete role', ['only' => ['destroy']]);
        $this->middleware('permission:show role', ['only' => ['show']]);
    }
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function index(Request $request)
    {
        $roles = Role::orderBy('id', 'DESC')->paginate(5);
        return view('admins.dashboard.roles.index', compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function create()
    {
        $roles = Role::orderBy('id', 'DESC')->paginate(5);
        $permissions = Permission::all();
        return view('admins.dashboard.roles.create', compact('permissions', 'roles'));
    }
/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permissions' => 'required|array',
            'permissions.*' => 'string', // You might want to adjust this based on your permission structure
            'guard_name' => 'required|string',
        ]);

        $role = Role::create([
            'name' => $request->input('name'),
            'guard_name' => 'admin',
        ]);

        $role->syncPermissions($request->input('permissions'));

        return redirect()->route('roles.index')->with('success', 'Role created successfully');
    }
/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();
        return view('admins.dashboard.roles.show', compact('role', 'rolePermissions'));
    }
/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function edit($id)
    {
        $role = Role::find($id);
        $roles = Role::all();
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return view('admins.dashboard.roles.edit', compact('role', 'permission', 'rolePermissions', 'roles'));
    }
/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
            // 'permission.*' => 'exists:permissions,id'
        ]);
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index')
            ->with('success', 'Role updated successfully');
    }
/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */

//  public function delete(){
//     return  view('admins.dashboard.roles.delete');
//  }
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')
            ->with('success', 'Role deleted successfully');
    }
}
