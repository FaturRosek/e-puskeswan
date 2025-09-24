<?php

namespace App\Http\Requests\Pencatatan;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGoodsRecording extends FormRequest
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
            'goods_name' => ['required', 'string'],
            'goods_entry' => ['required', 'string'],
            'goods_out' => ['required', 'string'],
            'description' => ['required', 'string'],
        ];
    }
}
