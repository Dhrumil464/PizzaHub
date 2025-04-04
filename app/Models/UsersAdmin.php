<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersAdmin extends Model
{
    use HasFactory;

    protected $table = 'users_admins';
    protected $primaryKey = 'userid';

    protected $fillable = ['username', 'firstname', 'lastname', 'email', 'phoneNo', 'userType', 'password'];
    
}
