<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $itemid = $this->route('category');

        return [
            // Ignore the current category's name for unique check during update
            'name' => ['required', 'string', 'max:255', Rule::unique('categories')->ignore($itemid)],
            'description' => 'nullable|string|max:500',
        ];
    }
}
