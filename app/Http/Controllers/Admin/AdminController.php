<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:admins|add admin|edit admin|delete admin', ['only' => ['index', 'store']]);
    //     $this->middleware('permission:add admin', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:edit admin', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:delete admin', ['only' => ['destroy']]);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $admins = Admin::orderBy('id', 'DESC')->paginate(5);
        // foreach ($admins as $admin) {
        //     var_dump($admin['role_name']);
        // }
        return view('admins.dashboard.admins.index', compact('admins'))
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
        $adminroles = Role::all();
        return view('admins.dashboard.admins.create', compact('roles', "adminroles"));
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
            'email' => 'required|email|unique:admins,email',
            'password' => 'required',
            'role_name' => 'required|array',
            'role_id' => 'string',

        ]);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = Admin::create($input);
        $user->assignRole($request->input('role'))->toarray();
        return redirect()->route('admins.index')
            ->with('success', 'admin created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('admins.dashboard.admins.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request, $id)
    {
        $data = $request->all();
        $admin = Admin::find($id);
        $admin->update($data);
        return redirect()->route('admin.index')->with('success', 'admin Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);
        $admin->delete();
        return redirect()->route('admin.index')->with('success', 'admin deleted Successfully');

    }
}
