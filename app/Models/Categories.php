<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $primaryKey = 'catid';

    protected $fillable = ['catname', 'catimage', 'catdesc', 'cattype', 'catcreatedate', 'catupdatedate'];

    public $timestamps = false;
}