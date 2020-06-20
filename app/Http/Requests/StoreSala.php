<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSala extends FormRequest
{

    public static function myRules(){
        return [
            'nombre' => 'required|min:3|max:500',
            'empresa_id' => 'required',
            'temperatura' => 'required',
            't_mas' => 'required',
            't_menos' => 'required',
        ];
    }

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
        return $this->myRules();
    }
}
