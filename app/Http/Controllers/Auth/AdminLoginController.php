<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admins.dashboard.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::guard('admin')->attempt($credentials)) {
            // Authentication passed
            return redirect('/admin/dashboard');
        }
        // dd((Auth::guard('admin')->attempt($credentials)));

        return redirect()->route('admin.login')->with('error', 'Invalid email or password.');
    }
}
