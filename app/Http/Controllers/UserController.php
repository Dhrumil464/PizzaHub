<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\UsersAdmin;
use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;
use App\Models\Contact;
use App\Models\ContactReply;
use App\Models\PizzaItems;
use Carbon\Carbon;

include "./PHPMailer/PHPMailer.php";
include "./PHPMailer/Exception.php";
include "./PHPMailer/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class UserController extends Controller
{
    /********************  User Controller *********************/

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
            if ($user->usertype == 0 || $user->usertype == 1) {
                if (password_verify($password, $user->password)) {
                    session(['userloggedin' => true, 'username' => $user->username, 'usertype' => $user->usertype, 'userId' => $user->userid]);
                    return back()->with('success', 'Logged in successfully!');
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
            'email' => 'required|string|email|unique:users_admins,email|max:30',
            'phoneNo' => 'required|numeric|digits:5|unique:users_admins,phoneNo',
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
            'email.max' => 'Email cannot exceed 30 characters.',

            'phoneNo.required' => 'Phone number is required.',
            'phoneNo.numeric' => 'Phone number must contain only numbers.',
            'phoneNo.digits' => 'Phone number must be exactly 5 digits.',
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

    /*****************  show user on admin side  ****************/

    public function userManageView()
    {
        $users = UsersAdmin::get();
        return view('admin.userManage', ["users" => $users]);
    }

    public function userManageAdd(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:users_admins,username|max:12',
            'firstName' => 'required|string|max:20',
            'lastName' => 'required|string|max:20',
            'email' => 'required|string|email|unique:users_admins,email|max:30',
            'phoneNo' => 'required|numeric|digits:5|unique:users_admins,phoneNo',
            'userType' => 'required',
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
            'email.max' => 'Email cannot exceed 30 characters.',

            'phoneNo.required' => 'PhoneNo is required.',
            'phoneNo.numeric' => 'Phone number must contain only numbers.',
            'phoneNo.digits' => 'Phone number must be exactly 5 digits.',
            'phoneNo.unique' => 'This phone number is already registered.',

            'userType.required' => 'Select UserType.',

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
            $user->usertype = $request->userType;

            if ($request->password == $request->cpassword) {
                $user->password = password_hash($request->password, PASSWORD_DEFAULT);
                $user->save();
                return back()->with('success', 'User Added Successfully !');
            } else {
                return back()->with('error', 'Password does not match !');
            }
        }
    }

    public function userManageUpdate(Request $request, $userid)
    {
        $request->validate([
            'editusername' => 'string|max:12',
            'editfirstName' => 'required|string|max:20',
            'editlastName' => 'required|string|max:20',
            'editemail' => 'string|email|max:30',
            'editphoneNo' => 'required|numeric|digits:5',
        ], [
            'editusername.string' => 'Username must be a valid string.',
            'editusername.max' => 'Username cannot exceed 12 characters.',

            'editfirstName.required' => 'Firstname is required.',
            'editfirstName.string' => 'Firstname must be a valid string.',
            'editfirstName.max' => 'Firstname cannot exceed 20 characters.',

            'editlastName.required' => 'Lastname is required.',
            'editlastName.string' => 'Lastname must be a valid string.',
            'editlastName.max' => 'Lastname cannot exceed 20 characters.',

            'editemail.string' => 'Email must be a valid string.',
            'editemail.email' => 'Enter a valid email address.',
            'editemail.max' => 'Email cannot exceed 30 characters.',

            'editphoneNo.required' => 'PhoneNo is required.',
            'editphoneNo.numeric' => 'Phone number must contain only numbers.',
            'editphoneNo.digits' => 'Phone number must be exactly 5 digits.',
            'editphoneNo.unique' => 'This phone number is already registered.',
        ]);

        $user = UsersAdmin::where('userid', $userid)->first();
        if ($user) {
            if ($user->usertype == 0) {
                $user->username = $request->editusername;
                $user->firstname = $request->editfirstName;
                $user->lastname = $request->editlastName;
                $user->phoneno = $request->editphoneNo;
                $user->save();
                return back()->with('success', 'User updated successfully!');
            } elseif ($user->usertype == 1) {
                $user->firstname = $request->editfirstName;
                $user->lastname = $request->editlastName;
                $user->email = $request->editemail;
                $user->phoneno = $request->editphoneNo;
                $user->save();
                return back()->with('success', 'Admin updated successfully!');
            } else {
                return back()->with('error', 'User not found!');
            }
        } else {
            return back()->with('error', 'User not found!');
        }
    }

    public function userManageDestroy($userid)
    {
        $user = UsersAdmin::where('userid', $userid);

        if ($user) {
            $user->delete();
            Session()->forget(['userloggedin', 'username', 'usertype', 'userId']);
            return back()->with('success', 'User removed successfully!');
        } else {
            return back()->with('error', 'User not found!');
        }
    }

    public function viewProfile()
    {
        return view('viewProfile');
    }

    public function manageProfile(Request $request, $userid)
    {
        $request->validate([
            'username' => 'string|max:12',
            'firstName' => 'required|string|max:20',
            'lastName' => 'required|string|max:20',
            'email' => 'string|email|max:30',
            'phoneNo' => 'required|numeric|digits:5',
        ], [
            'username.string' => 'Username must be a valid string.',
            'username.max' => 'Username cannot exceed 12 characters.',

            'firstName.required' => 'Firstname is required.',
            'firstName.string' => 'Firstname must be a valid string.',
            'firstName.max' => 'Firstname cannot exceed 20 characters.',

            'lastName.required' => 'Lastname is required.',
            'lastName.string' => 'Lastname must be a valid string.',
            'lastName.max' => 'Lastname cannot exceed 20 characters.',

            'email.string' => 'Email must be a valid string.',
            'email.email' => 'Enter a valid email address.',
            'email.max' => 'Email cannot exceed 30 characters.',

            'phoneNo.required' => 'PhoneNo is required.',
            'phoneNo.numeric' => 'Phone number must contain only numbers.',
            'phoneNo.digits' => 'Phone number must be exactly 5 digits.',
            'phoneNo.unique' => 'This phone number is already registered.',

            'password.string' => 'Password must be a valid string.',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.max' => 'Password cannot exceed 20 characters.',
        ]);

        $user = UsersAdmin::where('userid', $userid)->first();
        if ($user) {
            if ($user->usertype == 0) {
                $user->username = $request->username;
                $user->firstname = $request->firstName;
                $user->lastname = $request->lastName;
                $user->phoneno = $request->phoneNo;
                if ($request->password) {
                    if (strlen($request->password) < 20) {
                        $user->password = password_hash($request->password, PASSWORD_DEFAULT);
                    }
                }
                $user->save();
                return back()->with('success', 'Profile updated successfully!');
            } elseif ($user->usertype == 1) {
                $user->firstname = $request->firstName;
                $user->lastname = $request->lastName;
                $user->email = $request->email;
                $user->phoneno = $request->phoneNo;
                if ($request->password) {
                    if (strlen($request->password) < 20) {
                        $user->password = password_hash($request->password, PASSWORD_DEFAULT);
                    }
                }
                $user->save();
                return back()->with('success', 'Profile updated successfully!');
            } else {
                return back()->with('error', 'User not found!');
            }
        } else {
            return back()->with('error', 'User not found!');
        }
    }


    /*****************  Contact Us  ****************/

    function sendMailByUser($contactDetails, $user)
    {
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();                                            //Send using SMTP
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPSecure = 'ssl';                                  //Enable implicit TLS encryption
            $mail->Port       =  465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            $mail->Username   = 'bunkers0006@gmail.com';                     //SMTP username
            $mail->Password   = 'tarrxnpmpufadtaf';                               //SMTP password
            // $mail->Username   = 'dhrumilmandaviya464@gmail.com';                     //SMTP username
            // $mail->Password   = 'ctznzsfvutdpnqwa';                               //SMTP password

            $mail->setFrom($user->email, $user->firstname . ' ' . $user->lastname); //Set sender email and name
            $mail->addAddress('bunkers0006@gmail.com', 'Pizza Hub');     //Add a recipient

            $mail->isHTML(true);                                  //Set email format to HTML

            $mail->Subject = 'Pizzahub Contact Message.';
            $mail->Body    = '<h1>Contact Message</h1>
                            <p>Order ID: ' . $contactDetails->orderid . '</p>
                            <p>Email: ' . $contactDetails->email . '</p>
                            <p>Phone No: ' . $contactDetails->phoneno . '</p>
                            <p>Message: ' . $contactDetails->message . '</p>
                            <p>Contact Date: ' . $contactDetails->contactdate . '</p>';
            $mail->send();
            $contactDetails->save();
            return back()->with('success', 'Message sent successfully!');
        } catch (Exception $e) {
            return back()->with('error', 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo);
        }
    }

    public function contact()
    {
        return view('contact');
    }

    public function submitContact(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:30',
            'phoneno' => 'required|numeric|digits:5',
            'message' => 'required|string|max:100',
            'password' => 'required|string',
        ]);

        $user = UsersAdmin::where('userid', session('userId'))->first();

        if ($user->email == $request->email) {
            if (password_verify($request->password, $user->password)) {
                $contact = new Contact;
                $contact->userid = $user->userid;
                $contact->orderid = $request->orderid ? $request->orderid : 0;
                $contact->email = $request->email;
                $contact->phoneno = $request->phoneno;
                $contact->message = $request->message;
                $contact->contactdate = Carbon::now('Asia/Kolkata');

                if ($contact) {
                    $this->sendMailByUser($contact, $user);
                    return back();
                } else {
                    return back()->with('error', 'Failed to send message!');
                }
            } else {
                return back()->with('error', 'Invalid Password!');
            }
        } else {
            return back()->with('error', 'Email does not exists!');
        }
    }

    function sendMailByAdmin($contactDetails, $reply, $user)
    {
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();                                            //Send using SMTP
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPSecure = 'ssl';                                  //Enable implicit TLS encryption
            $mail->Port       =  465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            $mail->Username   = 'bunkers0006@gmail.com';                     //SMTP username
            $mail->Password   = 'tarrxnpmpufadtaf';                               //SMTP password
            // $mail->Username   = 'dhrumilmandaviya464@gmail.com';                     //SMTP username
            // $mail->Password   = 'ctznzsfvutdpnqwa';                               //SMTP password

            $mail->setFrom('bunkers0006@gmail.com', 'Pizza Hub'); //Set sender email and name
            $mail->addAddress($user->email, $user->firstname . ' ' . $user->lastname);     //Add a recipient

            $mail->isHTML(true);                                  //Set email format to HTML

            $mail->Subject = 'Pizzahub Contact Replay.';
            $mail->Body    = '<h1>Contact Message</h1>
                            <p>Order ID: ' . $contactDetails->orderid . '</p>
                            <p>Reply Date: ' . $reply->contactdate . '</p>
                            <p>Message: ' . $reply->message . '</p>
                            <p>Thank you for contacting us. We will get back to you soon.</p>
                            <p>Best Regards,</p>
                            <p>Pizza Hub</p>';

            $mail->send();
            $reply->save();
            return back()->with('success', 'Reply sent successfully!');
        } catch (Exception $e) {
            return back()->with('error', 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo);
        }
    }

    public function submitContactReply(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:100',
        ]);

        $user = UsersAdmin::where('userid', session('userId'))->first();
        $contact = Contact::where('contactId', $request->contactId)->first();
        if ($contact) {
            $reply = new ContactReply;
            $reply->contactId = $contact->contactId;
            $reply->userid = session('userId');
            $reply->message = $request->message;
            $reply->contactdate = Carbon::now('Asia/Kolkata');

            if ($reply) {
                $this->sendMailByAdmin($contact, $reply, $user);
                return back();
            } else {
                return back()->with('error', 'Failed to send message!');
            }
        } else {
            return back()->with('error', 'Contact not found!');
        }
    }

    public function userManageSearch(Request $request)
    {
        $search = $request->input('search');
        $cats = Categories::where('catname', 'LIKE', "%{$search}%")->orwhere('catdesc', 'LIKE', "%{$search}%")->get();
        $pizzaItems = PizzaItems::where('pizzaname', 'LIKE', "%{$search}%")->orwhere('pizzadesc', 'LIKE', "%{$search}%")->get();

        return view('search', ['cats' => $cats, 'pizzaItems' => $pizzaItems]);
    }
}
