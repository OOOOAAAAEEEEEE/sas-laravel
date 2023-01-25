<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthenticateController extends Controller
{
    public function index()
    {
        return view('main.authenticate.login');
    }

    public function authenticator(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/groupclasses');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our record.',
        ])->onlyInput('email');
    }

    public function register()
    {
    }

    public function storeAcc(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'master_classes_id' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ]);

        $user->create($validatedData);

        return redirect()->intended('/user');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
