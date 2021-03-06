<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    //para relacionar la la tabla user con rol
    public function roles(){
        return $this->belongsToMany('App\Role');
    }
    //creando la logica de validacion del roles
    public function authorizeRole($roles){//esta la funcion es a la que llamaremos 
        if($this->hasAnyRole($roles)){
            return true;
        }
        abort(401, 'No estas Autorizado');
    }
    public function hasAnyRole($roles){//esta fun es para un array de roles
        if(is_array($roles)){
            foreach ($roles as $role) {
                if($this->hasRole($role)){
                    return true;
                }
            }
        }else{
            if($this->hasRole($roles)){
                return true;
            }
        }
        return false;
    }
    public function hasRole($role){//esta fun es solo para un rol
        if($this->roles()->where('roleName', $role)->first()){
            return true;
        }
        return false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','remember_token', 'avatar'
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
}
