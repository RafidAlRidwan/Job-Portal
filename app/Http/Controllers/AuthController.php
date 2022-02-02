<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function form()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);


        $credentials = $request->only('email', 'password');
        $isAdmin = User::where('email', $request->email)->where('user_type','admin')->first();
        if (blank($isAdmin)) :
            return redirect()->back()->with('error', 'User not found');
        endif;
        if (Auth::attempt($credentials)) {
            Toastr::success(__('Login successfully'));
            return redirect()->route('dashboard');
        }
        return redirect()->back()->with('error', 'Invalid Credentials');
        return redirect()->back()->withInput();
    }

    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('/admin-login');
    }
}
