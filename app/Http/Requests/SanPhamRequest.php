<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanPhamRequest extends FormRequest
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
            'ma_san_pham'=>'required|max:10|unique:san_phams,ma_san_pham'.$this->route('id'),
            'ten_san_pham'=>'required|max:255',
            'hinh_anh'=>'image|mimes:jpg,jpeg,png,gif',
            'gia_san_pham'=>'required|numeric|min:0',
            'gia_khuyen_mai'=>'numeric|min:0|lt:gia_san_pham',
            'mo_ta_ngan'=>'string|max:255',
            'so_luong'=>'integer|min:0',
            'ngay_nhap'=>'required|date',
            'danh_muc_id'=>'required|exists:danh_mucs,id',
        ];
    }

    public function messages(): array
    {
        return [
            'ma_san_pham.required'=>'Mã sản phẩm bắt buộc điền',
            'ma_san_pham.max'=>'Mã sản phẩm không vượt quá 10 ký tự',
            'ma_san_pham.unique'=>'Mã sản phẩm đã tồn tại',
            'ten_san_pham.required'=>'Tên sản phẩm bắt buộc điền',
            'ten_san_pham.max'=>'Tên sản phẩm không vượt quá 255 ký tự',
            'hinh_anh.image'=>'hình ảnh không hợp lệ',
            'hinh_anh.mimes'=>'hình ảnh không hợp lệ',
            'gia_san_pham.required'=>'giá sản phẩm bắt buộc điền',
            'gia_san_pham.numeric'=>'giá sản phẩm là số',
            'gia_san_pham.min'=>'giá sản phẩm lớn hơn 0',
            'gia_khuyen_mai.numeric'=>'giá khuyến mãi là số',
            'gia_khuyen_mai.min'=>'giá khuyến mãi lớn hơn 0',
            'gia_khuyen_mai.lt'=>'giá khuyến mãi nhỏ hơn giá sản phẩm',
            'mo_ta_ngan.string'=>'mô tả phải là chuỗi',
            'mo_ta_ngan.max'=>'mô tả không quá 255 ký tự',
            'so_luong.integer'=>'số lượng phải là số',
            'so_luong.min'=>'số lượng lớn hơn 0',
            'ngay_nhap.required'=>'ngày nhập bắt buộc',
            'ngay_nhap.date'=>'ngày nhập không phù hợp',
            'danh_muc_id.required'=>'danh mục bắt buộc chọn',
            'danh_muc_id.exists'=>'danh mục không hợp lệ',
            
        ];
    }
}
