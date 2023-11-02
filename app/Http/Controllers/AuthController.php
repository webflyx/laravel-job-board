<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function create(Request $request)
    {
        return view("auth.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password'=> 'required',
        ]);

        $credentials = $request->only(['email', 'password']);
        $remember = $request->filled('remember');
        
        if(Auth::attempt($credentials, $remember)) {
            return redirect()->intended('/');
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    public function destroy(User $user)
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
