<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Motivo;

class Radicado extends Model
{

  protected $fillable = [
    'fech_send_dir',
    'time_send_dir',
    'fech_recive_radic',
    'time_recive_radic',
    'fech_recive_dir',
    'time_recive_dir',
    'fech_notifi_end',
    'time_notifi_end',
    'fech_delivered',
    'time_delivered',
    'obs',
    'respuesta',
    'editAdmRequest',
    'respon_id'];

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

  //query scope
  public function scopeName($query, $name){
    if ($name) 
      return $query->where('name','LIKE',"%$name%");  
  }
  public function scopelastname($query, $lastname){
    if ($lastname)
      return $query->where('last_name','LIKE',"%$lastname%");  
  }
  public function scopeNumradic($query, $fechradic_id){
    if ($fechradic_id)
      return $query->where('fechradic_id','LIKE',"%$fechradic_id%");  
  }
  public function scopeMotivo($query, $motivo){
    if ($motivo)
      return $query->where('motivo_id',$motivo);  
  }
  public function scopePrograma($query, $programa){
    if ($programa)
      return $query->where('program_id',$programa);  
  }
  public function scopeDates($query, $start_date, $end_date){
    if ($start_date && $end_date)
      return $query->whereBetween('year',[$start_date, $end_date]);  
  }
}
