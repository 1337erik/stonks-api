<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventFarmRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return is_god();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'farm_id' => 'required|exists:farms,id', // TODO yeah clean these up
            'farm_recorded_apr' => 'required',
            'farm_usd_value' => 'required',
            'coin_amount' => 'required',
            'coin_id' => 'required|exists:coins,id',
            'coin_usd_value' => 'required', // TODO numeric, double
        ];
    }
}
