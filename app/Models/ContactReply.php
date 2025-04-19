<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactReply extends Model
{
    use HasFactory;

    protected $table = 'contact_replies';
    protected $primaryKey = 'replyId';

    protected $fillable = ['contactId', 'userid', 'message', 'contactdate'];

    public $timestamps = false;
}
