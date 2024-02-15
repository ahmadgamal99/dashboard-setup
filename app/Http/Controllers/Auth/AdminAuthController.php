<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminAuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }


    public function showLoginForm()
    {
        return view('auth.admin_login');
    }


    public function login(Request $request)
    {

        $request->validate([
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);


        if (!Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember_me'))) {

            throw ValidationException::withMessages([
                "password" => __("There was an error with your E-Mail/Password"),
            ]);

        }

    }


    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
