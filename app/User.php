<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Role;
use App\Models\Radicado;
use App\Models\Sede;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','type_user','password','sede','program_id','superAdmin'
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
    public function sede(){
        return $this->BelongsTo(Sede::class);
    }

    public function Program(){
        return $this->BelongsTo(Program::class);
    }
 
}
