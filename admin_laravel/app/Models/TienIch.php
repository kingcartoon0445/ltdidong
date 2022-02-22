<?php

namespace App\Models;

use App\Models\CoTienIch;
use App\Models\DiaDanh;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class TienIch extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];

    public function diaDanhs(){
        return $this->hasMany(CoTienIch::class, 'MaDiaDanh');
    }
}
