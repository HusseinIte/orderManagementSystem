<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use Illuminate\Http\Request;

class AuthAdminController extends Controller
{
    public function showAdminView()
    {
        return view('admin.auth.login');
    }

    public function login(LoginRequest $request)
    {
        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('admin.showLogin');

    }
    public function logout(){
        auth()->logout();
        return redirect()->route('admin.showLogin');
    }
}
