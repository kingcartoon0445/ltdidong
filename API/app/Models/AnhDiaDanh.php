<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class AnhDiaDanh extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table ="anh_dia_danhs";
    protected $fillable =[
        'id',
        'MaDiaDanh',
        'Anh',
        'TrangThai',
    ];
}
