<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        // Redirect if already authenticated
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.login');
    }

    public function showRegister()
    {
        // Redirect if already authenticated
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.register');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'roblox_username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['name' => $credentials['roblox_username'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'roblox_username' => 'The provided credentials do not match our records.',
        ])->onlyInput('roblox_username');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'roblox_username' => 'required|string|max:255|unique:users,name',
            'gender' => 'required|in:male,female',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['roblox_username'],
            'email' => $validated['roblox_username'] . '@roblox.local', // Temporary email
            'gender' => $validated['gender'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);

        return redirect('dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
