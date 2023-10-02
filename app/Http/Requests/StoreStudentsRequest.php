<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'tgl_lahir'     => ['required', 'max:20'],
            'nim'           => ['required', 'max:10'],
            'nama'          => ['required', 'max:255'],
            'gender'        => ['required', 'max:255'],
            'alamat'        => ['required', 'max:500']
        ];
    }
}
