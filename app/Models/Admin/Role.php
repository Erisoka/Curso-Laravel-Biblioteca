<?php

namespace App\Models\Admin;

use App\Models\Seguridad\Usuario;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = [
        'nombre', 
    ];
    protected $guarded = ['id'];

    public function users()
    {
        return $this->belongsToMany(Usuario::class, 'role_user');
    }
}
