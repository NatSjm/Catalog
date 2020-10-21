<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize ()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules (Request $request)
    {
        $rules = [
            'name'                 => 'required',
            'fragrance_id'         => 'required|exists:fragrances,id',
            'type'                 => 'required',
            'value'                => Rule::requiredIf($request->type === 'Shampoo' || $request->type === 'Toothpaste' || $request->type === 'LiquidSoap'),
            'weight'               => Rule::requiredIf($request->type === 'SolidShampoo' || $request->type === 'Soap'),
            'whitening_effect'     => Rule::requiredIf($request->type === 'Toothpaste'),
            'is_antibacterial'     => Rule::requiredIf($request->type === 'Soap' || $request->type === 'LiquidSoap'),
            'contains_surfactants' => Rule::requiredIf($request->type === 'LiquidSoap'),
            'price'                => 'integer|required|min:1|max:100000',
            'description'          => 'max:500|sometimes',
        ];
        return $rules;
    }
}
