<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\DiaDanh;

class AnhDiaDanh extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function diaDanh(){
        return $this->belongsTo(DiaDanh::class);
    }
}
