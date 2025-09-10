<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Rules\RobloxUsernameExists;
use App\Services\RobloxService;

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

        // Try to authenticate using the roblox_username field
        if (Auth::attempt(['roblox_username' => $credentials['roblox_username'], 'password' => $credentials['password']])) {
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
            'roblox_username' => [
                'required',
                'string',
                'max:255',
                'unique:users,roblox_username',
                new RobloxUsernameExists()
            ],
            'gender' => 'required|in:male,female',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Get Roblox user data
        $robloxService = new RobloxService();
        $robloxData = $robloxService->getUserByUsername($validated['roblox_username']);

        if (!$robloxData) {
            return back()->withErrors([
                'roblox_username' => 'Unable to verify Roblox username. Please try again.',
            ])->onlyInput('roblox_username');
        }

        // Get avatar URL
        $avatarUrl = $robloxService->getUserAvatar($robloxData['id']);

        $user = User::create([
            'name' => $robloxData['username'], // Use exact Roblox username
            'email' => $robloxData['username'] . '@roblox.local',
            'gender' => $validated['gender'],
            'password' => Hash::make($validated['password']),
            'roblox_id' => $robloxData['id'],
            'roblox_username' => $robloxData['username'],
            'roblox_display_name' => $robloxData['display_name'],
            'roblox_description' => $robloxData['description'],
            'roblox_avatar_url' => $avatarUrl,
            'roblox_created' => $robloxData['created'] ? now()->parse($robloxData['created']) : null,
            'roblox_verified_badge' => $robloxData['has_verified_badge'],
            'roblox_data_updated' => now(),
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

    public function refreshRobloxData(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        if (!$user->roblox_username) {
            return redirect()->back()->with('error', 'No Roblox username associated with this account.');
        }

        $robloxService = new RobloxService();
        $robloxData = $robloxService->getUserByUsername($user->roblox_username);

        if (!$robloxData) {
            return redirect()->back()->with('error', 'Unable to fetch updated Roblox data.');
        }

        // Get updated avatar URL
        $avatarUrl = $robloxService->getUserAvatar($robloxData['id']);

        $user->roblox_display_name = $robloxData['display_name'];
        $user->roblox_description = $robloxData['description'];
        $user->roblox_avatar_url = $avatarUrl;
        $user->roblox_verified_badge = $robloxData['has_verified_badge'];
        $user->roblox_data_updated = now();
        $user->save();

        return redirect()->back()->with('success', 'Roblox data updated successfully!');
    }
}
