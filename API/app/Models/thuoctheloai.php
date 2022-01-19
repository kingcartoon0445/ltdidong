<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class thuoctheloai extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table ="thuoc_the_Loais";
    protected $fillable = [
       'MaTheLoai',
       'MaDiaDanh'
    ];
}
