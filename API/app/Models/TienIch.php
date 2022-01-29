<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class TienIch extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table ="tien_iches";
    protected $fillable =[
        'id',
        'Ten',
        'Anh',
        'Loai',
        'DiaChi',
        'Mota',
        'SDT',
        'TrangThai',    
    ];
}
