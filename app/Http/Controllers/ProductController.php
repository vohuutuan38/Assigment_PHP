<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function index () {
    $danhMuc = DanhMuc::get();
    $listSanPham = SanPham::query()->get();
    return view('clients.sanphams.cuahang',compact('danhMuc', 'listSanPham'));  
  }

  public function chiTietSanPham (string $id){
    $danhMuc = DanhMuc::get();
    $sanPham = SanPham::query()->findOrFail($id);

    $listSanPham = SanPham::query()->get();
    return view('clients.sanphams.chitiet',compact('listSanPham', 'sanPham', 'danhMuc'));  
  }

  public function productCategory (string $id) {
    $danhMuc = DanhMuc::get();
    $listSanPham = SanPham::with('danhMuc')->where('san_phams.danh_muc_id', $id)->get();
    // dd($listSanPham);

    return view('clients.sanphams.cuahang', compact('danhMuc', 'listSanPham'));
  }

  public function searchProduct (Request $request) {
    $danhMuc = DanhMuc::get();
    $search = $request->input('search');
    $listSanPham = SanPham::query()
                        ->when($search, function($query, $search) {
                            return $query
                            ->where('ten_san_pham', 'like', "%$search%");
                        })
                        ->get();
    // dd($listSanPham);

    return view('clients.sanphams.cuahang', compact('danhMuc', 'listSanPham'));
  }
}
