<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chitiethoadon extends Model
{

    public $timestamps  = false;

    protected $fillable = ["hoadon_id" , "sanpham_id", "soluong"];
}
