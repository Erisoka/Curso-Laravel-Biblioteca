<?php

namespace App\Models\Seguridad;

use App\Models\Admin\Rol;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Session;

class Usuario extends Authenticatable
{
    use Notifiable;
    protected $remember_token = false;
    protected $table = 'users';
    protected $fillable = ['usuario', 'nombre', 'password'];
    protected $primaryKey = 'id';

    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'rol_user');
    }

    public function setSession($roles) //setSession($roles) 
    {
        if (count($roles) == 1) {
            Session::put(
                [
                    'rol_id' => $roles[0]['id'],
                    'rol_nombre' => $roles[0]['nombre'],
                    'usuario' => $this->usuario,
                    'usuario_id' => $this->id,
                    'nombre_usuario' => $this->nombre
                ]
            );
        } 
        /*
        Session::put([
            'usuario' => $this->usuario,
            'usuario_id' => $this->id,
            'nombre_usuario' => $this->nombre
        ]);
        if (count($roles) == 1) {
            Session::put(
                [
                    'rol_id' => $roles[0]['id'],
                    'rol_nombre' => $roles[0]['nombre'],
                ]
            );
        } else {
            Session::put('roles', $roles);
        }
        */
    }

}
