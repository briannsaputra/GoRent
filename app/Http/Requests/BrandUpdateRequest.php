<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandUpdateRequest extends FormRequest
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
            'name' => 'unique:brands|max:100|required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'column name tidak boleh kosong.!',
            'name.max' => 'column name tidak boleh melebihi :max karakter.!',
            'name.unique' => 'column name sudah digunakan. Harap memilih karakter yang lain.!',
        ];
    }
}
