<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_name' => 'required | max:191',
            'company_id' => 'required | max:10',
            'price' => 'required | max:10',
            'stock' => 'required | max:10',
            'comment' => 'max:800',
            'product_image' => 'max:1000'
        ];
    }
}
