<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articale extends Model
{
    //
    protected $fillable = ['id' , 'title' , 'body' , 'updated_at', 'created_at'];
}
