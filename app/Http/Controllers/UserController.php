<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(): View
    {
        return view('users.register');
    }

    public function store(Request $request): RedirectResponse
    {
        User::validate($request);
        $user = new User();
        $user->setName($request->input('name'));
        $user->setEmail($request->input('email'));
        $user->setPhone($request->input('phone'));
        $user->setAddress($request->input('address'));
        $user->setRole('user');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect()->route('users.login')
            ->with('success', 'Account created successfully.');
    }

    public function login(): View
    {
        return view('users.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return redirect()->route('users.login')
            ->with('error', 'Invalid credentials.');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('users.login');
    }

    public function profile(): View
    {
        $viewData = [];
        $viewData['user'] = Auth::user();

        return view('users.profile')
            ->with('viewData', $viewData);
    }
}