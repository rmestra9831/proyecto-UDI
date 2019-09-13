<?php

namespace App\Models;
use App\User;
use App\Models\Radicado;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    protected $fillable = [
        ''
    ];

    //relacion entre tablas
    public function users(){
        return $this->hasMany(User::class);
    }
    public function radicados(){
        return $this->hasMany(Radicado::class);
    }
}
