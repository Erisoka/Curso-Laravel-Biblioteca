<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    protected $fillable = [
        'nombre', 'url', 'icono'
    ];
    protected $guarded = ['id']; //campos no editables por laravel
    //public $timestamps = false; //establece que no tiene timestamps
}
