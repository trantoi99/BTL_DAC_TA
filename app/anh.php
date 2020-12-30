<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class anh extends Model
{
    public $timestamps  = false;

    protected $fillable = ["Id_Sp", "Ten_anh"];
}
