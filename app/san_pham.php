<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class san_pham extends Model
{
    protected $primaryKey = "Id_Sp";
    protected $fillable = ["Id_Sp", "Ten_Sp", "Gia", "Id_loai"];
}
