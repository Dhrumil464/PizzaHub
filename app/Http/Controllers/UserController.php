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

    public function contact()
    {
        return view('contact');
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
            if ($user->usertype == 0 || $user->usertype == 1) {
                if (password_verify($password, $user->password)) {
                    session(['userloggedin' => true, 'username' => $user->username, 'usertype' => $user->usertype , 'userId' => $user->userid]);
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
        Session()->forget(['userloggedin', 'username', 'usertype', 'userId']);

        return redirect()->route('user.index')->with('success', 'Logged out successfully.');
    }

    public function handleUserSignup(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:users_admins,username|max:12',
            'firstName' => 'required|string|max:20',
            'lastName' => 'required|string|max:20',
            'email' => 'required|string|email|unique:users_admins,email|max:50',
            'phoneNo' => 'required|numeric|digits:10|unique:users_admins,phoneNo',
            'password' => 'required|string|min:8|max:20',
            'cpassword' => 'required|string|min:8|max:20|same:password',
        ], [
            'username.required' => 'Username is required.',
            'username.string' => 'Username must be a valid string.',
            'username.unique' => 'Username already exists.',
            'username.max' => 'Username cannot exceed 12 characters.',

            'firstName.required' => 'Firstname is required.',
            'firstName.string' => 'Firstname must be a valid string.',
            'firstName.max' => 'Firstname cannot exceed 20 characters.',

            'lastName.required' => 'Lastname is required.',
            'lastName.string' => 'Lastname must be a valid string.',
            'lastName.max' => 'Lastname cannot exceed 20 characters.',

            'email.required' => 'Email is required.',
            'email.string' => 'Email must be a valid string.',
            'email.email' => 'Enter a valid email address.',
            'email.unique' => 'This email is already registered.',
            'email.max' => 'Email cannot exceed 50 characters.',

            'phoneNo.required' => 'Phone number is required.',
            'phoneNo.numeric' => 'Phone number must contain only numbers.',
            'phoneNo.digits' => 'Phone number must be exactly 10 digits.',
            'phoneNo.unique' => 'This phone number is already registered.',

            'password.required' => 'Password is required.',
            'password.string' => 'Password must be a valid string.',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.max' => 'Password cannot exceed 20 characters.',

            'cpassword.required' => 'Confirm password is required.',
            'cpassword.string' => 'Confirm password must be a valid string.',
            'cpassword.min' => 'Confirm password must be at least 8 characters long.',
            'cpassword.max' => 'Confirm password cannot exceed 20 characters.',
            'cpassword.same' => 'Confirm password must match the password.',
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
            $user->phoneno = $request->phoneNo;
            $user->usertype = 0;

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
