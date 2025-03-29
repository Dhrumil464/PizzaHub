<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PizzaItems extends Model
{
    use HasFactory;

    protected $table = 'pizza_items';
    protected $primaryKey = 'pizzaid';

    protected $fillable = ['pizzaname', 'pizzaprice', 'pizzaimage', 'pizzadesc', 'catid', 'discount', 'pizzacreatedate', 'pizzaupdatedate'];

    public $timestamps = false;
}
