<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class ThuocTheLoai extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];
}
