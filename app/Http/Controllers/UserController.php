<?php

namespace App\Http\Controllers;

use App\Models\UsersAdmin;
use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;

class UserController extends Controller
{
    public function adminIndex()
    {
        return view('admin.login');
    }


    public function handleLogin(REQUEST $request) // when clicked on the admin login submit
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $username = $request->username;
        $password = $request->password;

        $user = UsersAdmin::where('username', $username)->first();
        if ($user->userType == 1) {
            if (password_verify($password, $user->password)) {
                session(['adminloggedin' => true, 'adminusername' => $username, 'adminuserId' => $user->userType]);

                // when match logged in so redirect to the dashboard
                return redirect()->route('admin.dashboard', ['loginsuccess' => 'true'])->with('success', 'Login successful');
            } else {
                return redirect()->route('admin.index', ['loginsuccess' => 'false'])->with('error', 'Invalid Credentials');
            }
        } else {
            return redirect()->route('admin.index', ['loginsuccess' => 'false'])->with('error', 'Invalid Credentials');
        }
    }


    public function dashboard()  // redirection comes here
    {
        return view('welcome');
    }


    // logout function
    public function logout(Request $request)
    {
        // Session::forget(['adminloggedin', 'adminusername', 'adminuserId']);

        // Invalidate and regenerate session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.index')->with('success', 'Logged out successfully.');
    }
}
