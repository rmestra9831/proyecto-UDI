<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name','correo_direction','sede'
    ];

    //Relaciones
    public function sede(){
        return $this->BelongsTo(Sede::class);
      }
    
    public function radicados(){
        return $this->hasMany(Radicado::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }
    
}
