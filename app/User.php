<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Role;
use App\Models\Radicado;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','type_user','password','sede'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //relaciones Usuario - Rol
    public function role(){
        return $this->BelongsTo(Role::class);
      }
      public function radicados(){
        return $this->hasMany(Radicado::class);
    }


    public function validate(Request $request)
    {
        $bandera = true;
        $users = User::where('sede', $request->sede)->get();
    
        foreach ($users as  $value) {
    
            if($value->sede===$user->sede){
                $bandera = true; 
            }
        }
        if ($bandera==false) {
            abort(404, 'Esta acción no está autorizada.');
        }
       
    }    
}
