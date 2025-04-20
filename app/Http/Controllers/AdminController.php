<?php

namespace App\Http\Controllers;

use App\Models\UsersAdmin;
use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;

use function PHPUnit\Framework\isEmpty;

class AdminController extends Controller
{
    /********************  Admin Controller *********************/

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
            if ($user->usertype == 1) {
                if (password_verify($password, $user->password)) {
                    session(['adminloggedin' => true, 'adminusername' => $username, 'adminuserId' => $user->usertype]);
                    // when match logged in so redirect to the dashboard
                    return redirect()->route('admin.index', ['loginsuccess' => 'true']);
                } else {
                    return back()->with('error', 'Invalid Credentials!');
                }
            } else {
                return back()->with('error', 'Invalid Credentials!');
            }
        } else {
            return back()->with('error', 'Invalid Credentials!');
        }
    }


    public function dashboardIndex()  // redirection comes here
    {
        return view('admin.index');
    }


    public function adminDashboard()
    {
        return view('admin.dashboard');
    }

    public function home()
    {
        return view('admin.home');
    }

    // logout function
    public function adminLogout()
    {
        Session()->forget(['adminloggedin', 'adminusername', 'adminuserId']);

        return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
    }



    // others

    public function manageOrders()
    {
        return view('admin.orderManage');
    }

    public function contactManage()
    {
        return view('admin.contactManage');
    }
}
