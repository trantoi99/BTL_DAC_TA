<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhan_vien extends Model
{
    protected $primaryKey = "Id_Nv";

    protected $fillable = ['Ten_Nv', 'Tuoi', 'Gioi_Tinh', 'SDT', 'Ca_lam_viec', 'Luong'];
}
