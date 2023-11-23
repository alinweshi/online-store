<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use DB;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:users|add user|edit user|delete user', ['only' => ['index', 'store']]);
        $this->middleware('permission:add user', ['only' => ['create', 'store']]);
        $this->middleware('permission:add user|edit user', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete user', ['only' => ['destroy']]);
    }
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function index(Request $request)
    {
        $data = User::orderBy('id', 'DESC')->paginate(5);
        return view('admins.dashboard.users.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        $userroles = Role::all();
        return view('admins.dashboard.users.create', compact('roles', "userroles"));
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'role' => 'required',
            'address' => 'string',
            'phone' => 'string',
            'status' => 'string',
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('role'))->toarray();
        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }
/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.dashboard.users.show', compact('user'));
    }
/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        // dd($roles);
        $userRole = $user->roles->pluck('name', 'name')->all();

        // dd($userRole);
        return view('admins.dashboard.users.edit', compact('user', 'roles', 'userRole'));
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
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'role' => 'required',
        ]);
        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }
/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function destroy($id)
    {
        $role = Role::find($id);

        if ($role) {
            // Use the delete method to delete the role
            $role->delete();

            return redirect()->route('roles.index')
                ->with('success', 'Role deleted successfully');
        } else {
            return redirect()->route('roles.index')
                ->with('error', 'Role not found or could not be deleted');
        }
    }

}
