<?php

namespace App\Http\Controllers\Admin;

use App\Models\DanhMuc;
use App\Models\SanPham;
use App\Models\BinhLuan;
use Illuminate\Http\Request;
use App\Models\HinhAnhSanPham;
use App\Http\Controllers\Controller;
use App\Http\Requests\SanPhamRequest;
use Illuminate\Support\Facades\Storage;

class SanPhamController extends Controller
{
    public $binhLuan;
    public function __construct () {
        $this->binhLuan = new BinhLuan();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Danh sách sản phẩm ';

        $listSanPham = SanPham::orderByDesc('is_type')->get();
        return view('admins.sanphams.index',compact('title','listSanPham'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Thêm sản phẩm ';
        $listDanhMuc = DanhMuc::query()->get();

        return view('admins.sanphams.create',compact('title','listDanhMuc'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SanPhamRequest $request)
    {
        if($request->isMethod('POST')){
           $params = $request->except('_token');

           // chuyển đổi giá trị checkbox thành boolean
           
           $params['is_new'] = $request->has('is_new') ? 1 : 0;
           $params['is_hot']= $request->has('is_hot') ? 1 : 0;
           $params['is_hot_deal']= $request->has('is_hot_deal') ? 1 : 0 ;
           $params['is_show_home']= $request->has('is_show_home') ? 1 : 0 ;

           // Xử lý hình ảnh đại diện

           if($request->hasFile('hinh_anh')){
            $params['hinh_anh']= $request->file('hinh_anh')->store('uploads/sanpham','public');
           }else{
            $params['hinh_anh'] = null;
            }
            
            // dd($params);
            // THêm sản phẩm
            $sanPham = SanPham::query()->create($params);

            // lấy id sản phẩm vừa thêm để thêm album ảnh
            $sanPhamID = $sanPham->id;

            // xử lý thêm album
            if($request->hasFile('list_hinh_anh')){
                foreach($request->file('list_hinh_anh') as $image){
                   if($image){
                      $path = $image->store('uploads/hinhanhsanpham/id_'.$sanPhamID,'public');
                      $sanPham->hinhAnhSanPham()->create([
                        'san_pham_id' => $sanPhamID,
                        'hinh_anh' => $path,
                    ]);
                   }
                }
            }
            return redirect()->route('admins.sanphams.index')->with('success','thêm sản phẩm thành công');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = 'Chi tiết sản phẩm ';
        $listDanhMuc = DanhMuc::query()->get();

        $sanPham = SanPham::query()->findOrFail($id);

        $binhLuan = $this->binhLuan->getById($id);

        // dd($binhLuan);

        return view('admins.sanphams.detail', compact('title','listDanhMuc','sanPham', 'binhLuan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Cập nhật sản phẩm ';
        $listDanhMuc = DanhMuc::query()->get();

        $sanPham = SanPham::query()->findOrFail($id);

        return view('admins.sanphams.edit',compact('title','listDanhMuc','sanPham'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->isMethod('PUT')){
            $params = $request->except('_token','_method');
 
            // chuyển đổi giá trị checkbox thành boolean
            
            $params['is_new'] = $request->has('is_new') ? 1 : 0;
            $params['is_hot']= $request->has('is_hot') ? 1 : 0;
            $params['is_hot_deal']= $request->has('is_hot_deal') ? 1 : 0 ;
            $params['is_show_home']= $request->has('is_show_home') ? 1 : 0 ;

            $sanPham = SanPham::query()->findOrFail($id);

 
            // Xử lý hình ảnh đại diện
 
            if($request->hasFile('hinh_anh')){
                if ($sanPham->hinh_anh && Storage::disk('public')->exists($sanPham->hinh_anh)) {
                    Storage::disk('public')->delete($sanPham->hinh_anh);
                }
             $params['hinh_anh']= $request->file('hinh_anh')->store('uploads/sanpham','public');
            }else{
             $params['hinh_anh'] = $sanPham->hinh_anh;
             }
             
             // Xử lý album ảnh 
           
                $currentImages = $sanPham->hinhAnhSanPham->pluck('id')->toArray();
                $arrayCombine = array_combine($currentImages,$currentImages);

                // Trường hợp xóa ảnh
                foreach ($arrayCombine as $key => $value) {
                    // Tìm kiếm id hình ảnh trong mảng hình ảnh mới đây lên 
                    // Nếu không tồn tại id thì tức người dùng đã xóa id hình ảnh đó
                    if (!array_key_exists($key,$request->list_hinh_anh)) {
                        $hinhAnhSanPham = HinhAnhSanPham::query()->find($key);
                        // Xóa hình ảnh 
                        if ($hinhAnhSanPham && Storage::disk('public')->exists($hinhAnhSanPham->hinh_anh)) {
                            Storage::disk('public')->delete($hinhAnhSanPham->hinh_anh);
                            $hinhAnhSanPham->delete();
                        }
                    }
                }
              // Trường hợp thêm hoặc sửa
              foreach ($request->list_hinh_anh as $key => $image) {
                if(!array_key_exists($key,$arrayCombine)){
                    if($request->hasFile("list_hinh_anh.$key")){
                       $path = $image->store('uploads/hinhanhsanpham/id_' .$id,'public');
                       $sanPham->hinhAnhSanPham()->create([
                        'san_pham_id' => $id,
                        'hinh_anh' => $path,
                       ]);
                    }
                }else if(is_file($image) && $request->hasFile("list_hinh_anh.$key")){
                    // trường hợp thay đổi hình ảnh 
                    $hinhAnhSanPham = HinhAnhSanPham::query()->find($key);
                    if($hinhAnhSanPham && Storage::disk('public')->exists($hinhAnhSanPham->hinh_anh) ){
                        Storage::disk('public')->delete($hinhAnhSanPham->hinh_anh);
                    }
                    $path = $image->store('uploads/hinhanhsanpham/id_' .$id,'public');
                    $hinhAnhSanPham->update([
                        'hinh_anh' => $path,
                       ]);

                }
              

             }
             $sanPham->update($params);
             
             return redirect()->route('admins.sanphams.index')->with('success','Cập nhật sản phẩm thành công');
         }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sanPham = SanPham::query()->findOrFail($id);

        // Xóa hình ảnh đại diện
        if ($sanPham->hinh_anh && Storage::disk('public')->exists($sanPham->hinh_anh)) {
            Storage::disk('public')->delete($sanPham->hinh_anh);
        }

        //  Xóa album
        $sanPham->hinhAnhSanPham()->delete();

        // Xóa toàn bộ hình ảnh trong thư mục
        $path = 'uploads/hinhanhsanpham/id_' .$id;
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->deleteDirectory($path);
        }
        
        // Xóa sản phẩm
        $sanPham->delete();

        return redirect()->route('admins.sanphams.index')->with('success','xóa sản phẩm thành công');
    }

    public function updateBinhLuan(Request $request, string $id)
    {
        $dataUdate = [
            'trang_thai' => $request->trang_thai
        ];
        $ids = $request->input('ids');
        dd($ids);
        // $binh_luan = $this->binh_luans->find($id);
        BinhLuan::whereIn('id', $ids)->update($dataUdate);

        return redirect()->route('admins.sanphams.show', $id);
    }
}
