<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Radicado;

class Motivo extends Model
{
    public function radicados(){
        return $this->hasMany(Radicado::class,'motivo_id');
    }
}
