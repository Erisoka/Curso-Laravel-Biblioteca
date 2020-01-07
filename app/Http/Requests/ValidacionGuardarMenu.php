<?php

namespace App\Http\Requests;

use App\Rules\ValidarCampoUrl;
use Illuminate\Foundation\Http\FormRequest;

class ValidacionGuardarMenu extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //validacion unique en el campo nombre, nombre unico en la tabla menu,
            //y en edicion se necesita un tercer parametro this->route(id) saca el id del request
            //que el nombre sea unico excepto con su id, o sea 
            //que no sea igual a otros nombres ya existentes
            'nombre' => 'required|max:50|unique:menus,nombre,' . $this->route('id'), 
            //se hace un make:rule ValidarCampoUrl, para hacer una regla especial para url
            //donde el url debe ser unico exceptuando cuando es #
            'url' => ['required',' max:100', new ValidarCampoUrl],
            'icono' => 'nullable|max:50'
        ];
    }   
}
