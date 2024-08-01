<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $danhMuc = DanhMuc::get();
        $sanPham = SanPham::query()->get();
        $sanPhamYeuThich = SanPham::query()->where('luot_xem','>','10')->get();
        
        return view('clients.index', compact('sanPham', 'danhMuc','sanPhamYeuThich'));
    }
}
