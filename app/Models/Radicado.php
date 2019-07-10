<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Motivo;

class Radicado extends Model
{

  protected $fillable = ['fech_send_dir','time_send_dir','fech_recive_radic','time_recive_radic','fech_recive_dir','time_recive_dir','fech_notifi_end','time_notifi_end','obs','respuesta'];

  /**
 * Get the route key for the model.
 *
 * @return string
 */
  public function getRouteKeyName()
  {
      return 'slug';
  }

  //relaciones entre tablas
  public function motivo(){
    return $this->BelongsTo(Motivo::class);
  }
  public function program(){
    return $this->BelongsTo(Program::class);
  }
  public function user(){
    return $this->BelongsTo(User::class);
  }
  public function fechradic(){
    return $this->hasOne(FechRadic::class);
  }
}
