<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NhanVienRequest extends FormRequest
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
            "Ten_Nv" => "required",
            "Tuoi" => "required",
            "Gioi_Tinh" => "required",
            "SDT" => "required",
            "Ca_lam_viec" => "required",
            "Luong" => "required"
        ];
    }

    public function getAttributes()
    {
        return array_merge(
            $this->only(['Ten_Nv', 'Tuoi', 'Gioi_Tinh', 'SDT', 'Ca_lam_viec', 'Luong'])
        );
    }
}
