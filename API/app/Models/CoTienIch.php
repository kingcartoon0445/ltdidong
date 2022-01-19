<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class CoTienIch extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table ="co_tien_iches";
    protected $fillable =[
       'MaNguoiDung',
       'MaTienIch'
    ];
}
