<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FechRadic extends Model
{
    protected $fillable = ['id_radicado'];

    public function radicados(){
        return $this->BelongsTo(Radicado::class);
      }
}
