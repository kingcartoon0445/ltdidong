<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class DiaDanh extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table ="dia_danhs";
    protected $fillable =[
        'id',
       'Ten',
       'DiaChi',
       'MaMien',
       'KinhDo',
       'ViDo',
       'MoTa',
       'TrangThai',
    ];
}
