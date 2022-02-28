<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class TheLoai extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $guarded = [];
}
