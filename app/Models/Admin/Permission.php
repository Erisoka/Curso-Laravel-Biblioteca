<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions'; //no lo necesito poner, sigo el estandar laravel snake (plural)

    protected $fillable = ['nombre', 'slug'];
    protected $guarded = ['id'];

    public function rol()
    {
        return $this->belongsToMany(Rol::class, 'permission_rol', 'permission_id', 'rol_id');
    }
}
