<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IntentionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        // permission policy to create intentions
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'      => 'required|max:255',
            'fulfill_by' => 'nullable|date'
        ];
    }
}
