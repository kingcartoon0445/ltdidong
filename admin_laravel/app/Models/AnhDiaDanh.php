<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

use App\Models\DiaDanh;

class AnhDiaDanh extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];

    public function diaDanh(){
        return $this->belongsTo(DiaDanh::class);
    }
}
