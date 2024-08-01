<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
                'ten_nguoi_nhan' => 'required|string|max:255',
                'so_dien_thoai_nguoi_nhan' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'email_nguoi_nhan' => 'required|string|email|max:255',
                'dia_chi_nguoi_nhan' => 'required|string|max:255',
        ];
    }


    public function messages()
    {
        return[
            'ten_nguoi_nhan.required' => 'Tên người nhận bắt buộc',
            'ten_nguoi_nhan.string' => 'Tên phải là chuỗi ký tự',
            'ten_nguoi_nhan.max' => 'tên không vượt quá 255 ký tự',
            'so_dien_thoai_nguoi_nhan.required' => 'Số điện thoại người nhận',
            'so_dien_thoai_nguoi_nhan.string' => 'Số điện thoại người nhận phải là chuỗi ký tự',
            'so_dien_thoai_nguoi_nhan.regex' => 'Định dạng số điện thoại không hợp lệ',
            'so_dien_thoai_nguoi_nhan.min' => 'Số điện thoại ít nhất là 10 số',
            'email_nguoi_nhan.required' => 'Email người nhận bắt buộc nhập',
            'email_nguoi_nhan.string' => 'Email người nhận phải là một chuỗi',
            'email_nguoi_nhan.email' => 'Email không hợp lệ',
            'email_nguoi_nhan.max' => 'Email không vượt quá 255 ký tự',
            'dia_chi_nguoi_nhan.required' => 'Địa chỉ người nhận bắt buộc nhập',
            'dia_chi_nguoi_nhan.string' => 'Địa chỉ người nhận phải là chuỗi',
            'dia_chi_nguoi_nhan.max' => 'Địa chỉ người nhận không vượt quá 255 ký tự',

        ];
    }
}
