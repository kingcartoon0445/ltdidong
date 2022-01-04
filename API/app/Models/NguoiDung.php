<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class NguoiDung extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table ="nguoi_dungs";
    protected $fillable = [
        'TenDaiDien',
        'HovaTen',
        'Hoten',
        'Email',
        'SDT',
        'AnhNen',
        'MatKhau',
        'TrangThai',
    ];
}
