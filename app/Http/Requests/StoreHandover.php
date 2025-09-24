<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHandover extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'goods_id' => ['required|exists:goods,id'],
            'unit_id' => ['required|exists:units,id'],
            'procurement_id' => ['required|exists:procurements,id'],
            'goods_amount' => ['required'],
            'tgl_exp_date' => ['required|date'],
        ];
    }
}
