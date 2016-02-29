<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request
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
            'name' => 'required|max:32',
            'description' => 'required',
            'subcategory_id' => 'required',
            'price' => 'required',
            'quantity' => 'required_if:type,item',
            'date_of_end' => 'date|after:tommorow',
            //'img1' => 'image'
        ];
    }
}
