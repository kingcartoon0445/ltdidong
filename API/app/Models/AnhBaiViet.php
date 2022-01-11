<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class AnhBaiViet extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table ="anh_bai_viets";
    protected $fillable =[
        'id',
        'MaBaiViet',
        'Anh',
        'TrangThai',
    ];
}
