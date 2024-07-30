<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MobilCreateRequest extends FormRequest
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
            'car_plate' => 'unique:cars|max:12|required',
            'model' => 'max:50|required',
            'harga' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'car_plate.required' => 'column car_plate tidak boleh kosong.!',
            'car_plate.max' => 'column car_plate tidak boleh melebihi :max karakter.!',
            'car_plate.unique' => 'column car_plate sudah digunakan. Harap memilih karakter yang lain.!',
            'model.max' => 'column model tidak boleh melebihi :max karakter.!',
            'model.required' => 'column model tidak boleh kosong.!',
            'harga.required' => 'column harga tidak boleh kosong.!'
        ];
    }
}
