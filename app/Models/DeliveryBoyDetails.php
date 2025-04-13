<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryDetails extends Model
{
    use HasFactory;

    protected $table = 'delivery_boy_details';
    protected $primaryKey = 'dbid';

    protected $fillable = ['deliveryboyname', 'deliveryboyphoneno', 'deliveryboyemail'];

    public $timestamps = false;
}
