<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use Illuminate\Http\Request;

class DonHangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Danh sách danh mục đơn hàng ';

        $listDonHang = DonHang::orderByDesc('id')->get();

        $trangThaiDonHang = DonHang::TRANG_THAI_DON_HANG;
        // dd($trangThaiDonHang);
        return view('admins.donhangs.index', compact('title', 'listDonHang', 'trangThaiDonHang'));
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "Thông tin chi tiết đơn hàng";
        $donHang = DonHang::query()->findOrFail($id);
        $trangThaiDonHang = DonHang::TRANG_THAI_DON_HANG;

        $trangThaiThanhToan = DonHang::TRANG_THAI_THANH_TOAN;

        return view('admins.donhangs.show', compact('title', 'donHang', 'trangThaiDonHang', 'trangThaiThanhToan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $donhang = DonHang::findOrFail($id);
        $currentTrangThai = $donhang->trang_thai_don_hang;
        $newTrangThai = $request->input('trang_thai_don_hang');
        // dd($newTrangThai);
        $trangThais = array_keys(DonHang::TRANG_THAI_DON_HANG);

        if ($currentTrangThai == DonHang::HUY_DON_HANG) {
            return redirect()->route('admins.donhangs.index')->with('error', 'Đơn hàng đã hủy không thể đổi trạng thái');
        }
        if (array_search($newTrangThai, $trangThais) < array_search($currentTrangThai, $trangThais)) {
            return redirect()->route('admins.donhangs.index')->with('error', 'Trạng thái không thể cập nhập ngược');
        }
        $donhang->trang_thai_don_hang = $newTrangThai;
        $donhang->save();
        return redirect()->route('admins.donhangs.index')->with('success', 'Thay đổi thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $donhang = DonHang::findOrFail($id);
        if ($donhang && $donhang->trang_thai_don_hang == DonHang::HUY_DON_HANG) {
            $donhang->chiTietDonHang()->delete();

            $donhang->delete();
            return redirect()->route('admins.donhangs.index')->with('success', 'Xóa thành công');
        }
        return redirect()->route('admins.donhangs.index')->with('error', 'Không thể xóa');
    }
}
