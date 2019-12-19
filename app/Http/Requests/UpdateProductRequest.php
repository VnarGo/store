<?php

namespace Store\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;
use Gate;
use Store\Product;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
       abort_if(Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'         => [
                'required',
            ],
            'brand_id' => [
                'integer',
            ],
            'price'   => [
                'required',
                'decimal',
            ],
            'discount_price'   => [
                'required',
                'decimal',
            ],
        ];
    }
}
