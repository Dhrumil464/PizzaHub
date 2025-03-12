<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PizzaItems extends Model
{
    use HasFactory;

    protected $table = 'pizza_items';
    protected $primaryKey = 'pizzaid';

    protected $fillable = ['pizzaname', 'pizzaprice', 'pizzaimage', 'pizzadesc', 'catid', 'dicount', 'pizzacreatedate', 'pizzaupdatedate'];
    
    public $timestamps = false;
}
