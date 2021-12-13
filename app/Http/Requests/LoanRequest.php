<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoanRequest extends FormRequest
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
            'duration'=>'required',
            'amount'=>'required',
            'interest_rate'=>'required',
        ];
    }

    public function messages()
{
    return [
        'duration.required' => 'Loan duration is required',
        'amount.required'  => 'Amount is required',
        'interest_rate.required'  => 'Interest rate is required',
    ];
}
}
