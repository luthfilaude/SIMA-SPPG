<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],
        [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);
        // Authentication logic here
        if(Auth::attempt($request->only('email', 'password'), $request->remember)){
            return redirect('/dashboard');
        }
        return back()->withErrors([
            'failed' => 'Email atau password salah.',
        ])->withInput();
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
