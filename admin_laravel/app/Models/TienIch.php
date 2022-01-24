<?php

namespace App\Models;

use App\Models\CoTienIch;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TienIch extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function diaDanhs(){
        return $this->hasMany(CoTienIch::class, 'MaDiaDanh');
    }
}
