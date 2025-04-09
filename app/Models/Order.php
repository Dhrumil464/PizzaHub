<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = ['orderid', 'userid', 'fullname', 'email', 'address', 'zip', 'phoneno', 'totalfinalprice', 'discountedtotalprice', 'paymentmethod', 'orderstatus', 'orderdate'];

    public $timestamps = false;
}
