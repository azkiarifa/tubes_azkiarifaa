<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {

            $role = Auth::user()->role;

            if ($role == 'admin') {
                return redirect('/admin/dashboard');
            }
            if ($role == 'seller') {
                return redirect('/seller/dashboard');
            }

            return redirect('/user/dashboard');
        }

        return back()->with('error', 'Email atau password salah');
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
            'role' => 'required|string|in:user,seller'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/login')->with('success', 'Akun berhasil dibuat');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
