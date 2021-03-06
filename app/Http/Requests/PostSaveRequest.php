<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostSaveRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'is_open' => ['nullable'],
            'picture' => ['image', 'max:5000'],
        ];
    }

    public function validated()
    {
        $validated = $this->validator->validated();

        return array_merge($validated, [
            'is_open' => $this->boolean('is_open'),
        ]);
    }
}
