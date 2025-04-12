<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryDetails extends Model
{
    use HasFactory;

    protected $table = 'delivery_details';
    protected $primaryKey = 'deliveryid';

    protected $fillable = ['orderid','deliveryboyname','deliveryboyphoneno','deliverytime','trackid','deliverydate'];

    public $timestamps = false;
}
