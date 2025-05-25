<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('be.login_be.index');
    }

    /**
     * Handle a login request to the application.
     */
    public function login(Request $request)
    {
        // Validate the login form data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($request->only('email', 'password'))) {
            // If successful, redirect to intended location
            return redirect()->intended('/dashboard')->with('success', 'Login Berhasil! yeay');
        }

        // If unsuccessful, redirect back with input and error message
        return redirect()->back()->withInput($request->only('email'))->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->with('error', 'Login failed. Please check your credentials.');
    }

    /**
     * Log the user out of the application.
     */


    public function authenticated(Request $request, $user)
    {
        if ($user->jabatan === 'admin') {
            return redirect()->route('dashboard.admin');
        } elseif ($user->jabatan === 'apoteker') {
            return redirect()->route('dashboard.apoteker');
        } elseif ($user->jabatan === 'kasir') {
            return redirect()->route('dashboard.kasir');
        } elseif ($user->jabatan === 'pemilik') {
            return redirect()->route('dashboard.owner');
        } else {
            return redirect()->route('dashboard.karyawan');
        }
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}