<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'category_id' => 'required',
            'image' => 'required|image'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Necesitamos el nombre del producto!',
            'description.required' => 'Necesitamos una descripción del producto!',
            'price.required' => 'Necesitamos el precio del producto!',
            'stock.required' => 'Necesitamos el stock del producto!',
            'category_id.required' => 'Necesitamos la categoría del producto!',
            'image.required' => 'Necesitamos la imagen del producto!',
            'image.image' => 'Necesitamos que el archivo sea una imagen!',
        ];
    }
}
