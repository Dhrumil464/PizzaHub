<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';
    protected $primaryKey = 'orderitemid';

    protected $fillable = ['orderid', 'pizzaid', 'catid', 'quantity', 'discount'];

    public $timestamps = false;
}
