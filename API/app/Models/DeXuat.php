<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class DeXuat extends Model
{
    use HasFactory;
    use HasApiTokens, HasFactory, Notifiable;
    protected $table ="de_xuats";
    protected $fillable =[
       'MaNguoiDung',
       'MaDiaDanh',
    ];
}
