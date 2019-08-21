<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    public function radicados(){
        return $this->hasMany(Radicado::class);
    }

    protected $fillable = [
        'name_dir','name','correo_direction'
    ];

}
