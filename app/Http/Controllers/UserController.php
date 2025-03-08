<?php

namespace App\Http\Controllers;

use App\Models\UsersAdmin;
use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;

class UserController extends Controller
{
    /********************  User Controller *********************/
    
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

    public function handleUserLogin(REQUEST $request) // when clicked on the admin login submit
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $email = $request->email;
        $password = $request->password;

        $user = UsersAdmin::where('email', $email)->first();
        if ($user) {
            if ($user->userType == 0 || $user->userType == 1) {
                if (password_verify($password, $user->password)) {
                    session(['userloggedin' => true, 'username' => $user->username, 'userId' => $user->userType]);
                    return back()->with('success', 'Logged in successfully!');
                } else {
                    return back()->with('error', 'Invalid Credentials!');
                }
            }else {
                return back()->with('error', 'Invalid Credentials!');
            }
        } else {
            return back()->with('error', 'Invalid Credentials!');
        }
    }

    public function userLogout()
    {
        Session()->forget(['userloggedin', 'username', 'userId']);

        return redirect()->route('user.index')->with('success', 'Logged out successfully.');
    }

    public function handleUserSignup(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|email',
            'phoneNo' =>  'required|min_digits:10|max_digits:10',
            'password' => 'required',
            'cpassword' => 'required'
        ]);

        $user = UsersAdmin::where('email', $request->email)->first();
        if ($user) {
            return back()->with('error', 'Email already exists !');
        } else {
            $user = new UsersAdmin;
            $user->username = $request->username;
            $user->firstname = $request->firstName;
            $user->lastname = $request->lastName;
            $user->email = $request->email;
            $user->phoneNo = $request->phoneNo;
            $user->userType = 0;

            if ($request->password == $request->cpassword) {
                $user->password = password_hash($request->password, PASSWORD_DEFAULT);
                $user->save();
                return back()->with('success', 'Signup Successfully !');
            } else {
                return back()->with('error', 'Password does not match !');
            }
        }
    }
}
