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
}
