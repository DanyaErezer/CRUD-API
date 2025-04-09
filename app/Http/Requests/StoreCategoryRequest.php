<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3|max:255',
            'parent_id' => 'nullable|exists:category_categories,id',
        ];
    }
}
