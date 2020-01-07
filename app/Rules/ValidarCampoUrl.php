<?php

namespace App\Rules;

use App\Models\Admin\Menu;
use Illuminate\Contracts\Validation\Rule;

class ValidarCampoUrl implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //si la url no es igual a #, verificar que no exista otra url igual en la BD
        if ($value != '#') {
            //busca en el campo url (attribute), la url enviada en el value
            $menu = Menu::where($attribute, $value)->get(); 
            return $menu->isEmpty(); //true (vacia) no existe esa url, puede hacer el menu con esa url
            // false (al menos una) si existe esa url en la BD, no puede hacer el menu con esa url
        }
        return true; // la url es igual a #, puede hacer menus con esa url
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Esta url ya esta asignada.';
    }
}
