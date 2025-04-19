<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';
    protected $primaryKey = 'contactId';

    protected $fillable = ['userid', 'orderid', 'email', 'phoneno', 'message', 'contactdate'];

    public $timestamps = false;
}
