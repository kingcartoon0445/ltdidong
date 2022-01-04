<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class AnhDiaDanh extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table ="bai_viets";
    protected $fillable =[
        'id',
        'MaDiaDanh',
        'Anh',
        'TrangThai',
    ];
}
