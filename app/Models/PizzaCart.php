<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PizzaCart extends Model
{
    use HasFactory;

    protected $table = 'pizza_carts';
    protected $primaryKey = 'cartitemid';

    protected $fillable = ['pizzaid', 'userid', 'quantity', 'itemadddate'];

    public $timestamps = false;
}
