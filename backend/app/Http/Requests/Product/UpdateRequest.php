<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'nullable',
            'description' => 'nullable',
            'content' => 'nullable',
            'price' => 'nullable',
            'count' => 'nullable',
            'preview_image' => 'nullable',
            'is_published' => 'nullable',
            'tags' => 'nullable',
            'colors' => 'nullable',
            'category_id' => 'nullable',
            'product_images' => 'nullable'
        ];
    }
}
