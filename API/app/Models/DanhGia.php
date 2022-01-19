<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class DanhGia extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table ="danh_gias";
    protected $fillable =[
       'MaNguoiDung',
       'MaDiaDanh',
       'SoDanhGia'
    ];
}
