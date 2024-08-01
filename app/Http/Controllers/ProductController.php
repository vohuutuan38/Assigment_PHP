<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use App\Models\SanPham;
use App\Models\BinhLuan;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public $binhLuan;
  public function __construct() {
    $this->binhLuan = new BinhLuan();
  }
  public function index () {
    $danhMuc = DanhMuc::get();
    $listSanPham = SanPham::query()->get();
    return view('clients.sanphams.cuahang',compact('danhMuc', 'listSanPham'));  
  }

  public function chiTietSanPham (string $id){
    $danhMuc = DanhMuc::get();
    $sanPham = SanPham::query()->findOrFail($id);
    $binhLuan = $this->binhLuan->getById($id);
    $listSanPham = SanPham::query()->get();
    return view('clients.sanphams.chitiet',compact('listSanPham', 'sanPham', 'danhMuc', 'binhLuan'));  
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
  public function binhLuan(Request $request, string $san_pham_id) {
    $data = request()->all('noi_dung');
    $data['tai_khoan_id'] = auth()->id();
    $data['san_pham_id'] = $san_pham_id;
    BinhLuan::create($data);

    return redirect()->route('products.detail', $san_pham_id);
  }
}
