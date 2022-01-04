<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Mien extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table ="miens";
    protected $fillable =[
        'id',
        'TenMien',
    ];
}
