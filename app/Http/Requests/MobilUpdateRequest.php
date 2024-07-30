<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MobilUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'car_plate' => 'max:12|required',
            'model' => 'max:50|required',
            'harga' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'car_plate.required' => 'column car_plate tidak boleh kosong.!',
            'car_plate.max' => 'column car_plate tidak boleh melebihi :max karakter.!',
            'model.max' => 'column model tidak boleh melebihi :max karakter.!',
            'model.required' => 'column model tidak boleh kosong.!',
            'harga.required' => 'column harga tidak boleh kosong.!'
        ];
    }
}
