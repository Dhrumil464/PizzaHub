<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PizzaCart extends Model
{
    use HasFactory;

    protected $table = 'pizzacarts';
    protected $primaryKey = 'cartitemid';

    protected $fillable = ['pizzaid', 'userid', 'quantity', 'size', 'itemadddate'];

    public $timestamps = false;
}
