<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGoodshandoverRequest extends FormRequest
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
    public function rules()
    {
        return [
            'date_received' => 'required|date',
            'no_bast' => 'required|string|max:255',
            'file_bast' => 'nullable|file|mimes:pdf',
            'file_pengajuan' => 'nullable|file',
            'description' => 'nullable|string',
            'goods_id.*' => 'required|exists:goods,id',
            'unit_id.*' => 'required|exists:units,id',
            'procurement_id.*' => 'required|exists:procurements,id',
            'goods_amount.*' => 'required|integer|min:1',
            'tgl_exp_date.*' => 'nullable|date',
            // 'pengirim.*' => 'required|exists:users,id',
            // 'penerima.*' => 'required|exists:users,id',
            // 'nama_pengirim' => 'required|string|max:255',
            // 'NIP' => 'required|string|max:255',
            // 'pangkat' => 'required|string|max:255',
            // 'jabatan' => 'required|string|max:255',
            // 'alamat_pengirim' => 'required|string|max:255',
            // // 'nama_penerima' => 'required|string|max:255',
            // 'NIP_pks' => 'required|string|max:255',
            // 'pangkat_pks' => 'required|string|max:255',
            // 'jabatan_pks' => 'required|string|max:255',
            // 'alamat_penerima' => 'required|string|max:255',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $penerimaFilled = $this->filled('nama_penerima');
            $otherFieldsFilled = $this->filled('penerima.*') && $this->filled('NIP_pks') && $this->filled('pangkat_pks') && $this->filled('jabatan_pks');

            if (!$penerimaFilled && !$otherFieldsFilled) {
                // $validator->errors()->add('penerima', 'Either Penerima or Puskeswan ID, NIP, Pangkat, and Jabatan must be filled.');
                // $validator->errors()->add('puskeswan_id', 'Either Penerima or Puskeswan ID, NIP, Pangkat, and Jabatan must be filled.');
                // $validator->errors()->add('NIP_pks', 'Either Penerima or Puskeswan ID, NIP, Pangkat, and Jabatan must be filled.');
                // $validator->errors()->add('pangkat_pks', 'Either Penerima or Puskeswan ID, NIP, Pangkat, and Jabatan must be filled.');
                // $validator->errors()->add('jabatan_pks', 'Either Penerima or Puskeswan ID, NIP, Pangkat, and Jabatan must be filled.');
            }
        });
    }
}
