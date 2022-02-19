<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\BaiViet;

class AnhBaiViet extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];

    public function baiviet(){
        return $this->belongsTo(BaiViet::class);
    }
}
