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


    public function handleAdminLogin(REQUEST $request) // when clicked on the admin login submit
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $username = $request->username;
        $password = $request->password;

        $user = UsersAdmin::where('username', $username)->first();
        if ($user) {
            if($user->userType == 1)
            {
                if (password_verify($password, $user->password)) {
                    session(['adminloggedin' => true, 'adminusername' => $username, 'adminuserId' => $user->userType]);
    
                    // when match logged in so redirect to the dashboard
                    return redirect()->route('admin.dashboard', ['loginsuccess' => 'true'])->with('success', 'Login successful');
                } else {
                    return back()->with('error', 'Invalid Credentials');
                }
            }else{
                return back()->with('error', 'Invalid Credentials');
            }
            
        } else {
            return back()->with('error', 'Invalid Credentials');
        }
    }


    public function dashboard()  // redirection comes here
    {
        if(request('loginsuccess') == 'true')
        {
            return view('welcome');
        }
        else {
            return redirect()->route('admin.index', ['loginsuccess' => 'false'])->with('error', 'Login Now');
        }
    }


    // logout function
    public function adminLogout(Request $request)
    {
        // Session::forget(['adminloggedin', 'adminusername', 'adminuserId']);

        // Invalidate and regenerate session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.index')->with('success', 'Logged out successfully.');
    }







    /********************  User Parts *********************/
    public function userIndex()
    {
        return view('index');
    }

    public function viewProfile()
    {
        return view('viewProfile');
    }
    
    public function viewOrder()
    {
        return view('viewOrder');
    }

    public function viewPizzaList()
    {
        return view('viewPizzaList');
    }

    public function viewPizza()
    {
        return view('viewPizza');
    }

    public function viewCart()
    {
        return view('viewCart');
    }

    public function search()
    {
        return view('search');
    }

    public function about()
    {
        return view('about');
    }
}
