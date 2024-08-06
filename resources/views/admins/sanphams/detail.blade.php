@extends('layout.admin')
 
@section('title')
    {{$title}}
@endsection

@section('css')
<link href="{{asset('assets/admin/libs/quill/quill.core.js')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/libs/quill/quill.snow.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/libs/quill/quill.bubble.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Chi tiết sản phẩm</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0"> {{$title}}</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <form action="{{route('admins.sanphams.show',$sanPham->id)}}" method="GET" enctype="multipart/form-data">
                        <div class="row">
                                <div class="col-lg-4 ">
                                    <div class="mb-3">
                                        <label for="trang_thai" class="form-label">Mã sản phẩm</label>
                                        <input type="text" id="ma_san_pham" name="ma_san_pham" class="form-control" readonly value="{{$sanPham->ma_san_pham}}" >
            
                                    </div>  

                                    <div class="mb-3">
                                        <label for="trang_thai" class="form-label">Tên sản phẩm</label>
                                        <input type="text" id="ten_san_pham" name="ten_san_pham" class="form-control" readonly value="{{$sanPham->ten_san_pham}}" >
                                    </div>  

                                    <div class="mb-3">
                                        <label for="trang_thai" class="form-label">Giá sản phẩm</label>
                                        <input type="number" id="gia_san_pham" name="gia_san_pham" class="form-control" readonly value="{{$sanPham->gia_san_pham}}" >
                                    </div>  

                                    <div class="mb-3">
                                        <label for="trang_thai" class="form-label">Giá khuyến mãi</label>
                                        <input type="number" id="gia_khuyen_mai" name="gia_khuyen_mai" class="form-control" readonly value="{{$sanPham->gia_khuyen_mai}}" >
                                    </div>  

                                    <div class="mb-3">
                                        <label for="trang_thai" class="form-label" >Danh mục</label>
                                    <select name="danh_muc_id" id="" class="form-select" disabled>
                                        <option  selected>---Chọn Danh Mục---</option>
                                        @foreach ($listDanhMuc as $item)
                                        <option value="{{$item->id}}" {{$sanPham->danh_muc_id== $item->id ? 'selected' : ''}}>{{$item->ten_danh_muc}}</option>
                                        @endforeach
                                    </select>
                                    </div>  

                                    <div class="mb-3">
                                        <label for="trang_thai" class="form-label">Số lượng</label>
                                        <input type="number" id="so_luong" name="so_luong" class="form-control" readonly value="{{$sanPham->so_luong}}">
                                    </div>  

                                    <div class="mb-3">
                                        <label for="trang_thai" class="form-label">Ngày Nhập</label>
                                        <input type="date" id="ngay_nhap" name="ngay_nhap" class="form-control" readonly value="{{$sanPham->ngay_nhap}}" >
                                    </div> 

                                    <div class="mb-3">
                                        <label for="mo_ta_ngan" class="form-label">Mô tả ngắn</label>
                                        <textarea name="mo_ta_ngan" id="mo_ta_ngan" rows="3" class="form-control" readonly>{{$sanPham->mo_ta_ngan}}</textarea>
                                    </div> 

                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Trạng Thái</label>
                                        <input type="text" class="form-control" readonly value="{{$sanPham->is_type == 1 ? 'Hiển thị' : 'Ẩn'}}">
                                    
                                    </div>
                                    
                                <div class="form-switch mb-2 d-flex justify-content-between">
                                
                                </div>


                                </div>

                            
                                
                            

                            <div class="col-lg-8">
                                <div class="mb-3">
                                    <label class="form-label" for="">Mô tả chi tiết sản phẩm</label>
                                    <div id="quill-editor" style="height: 400px;">
                                        <h1>Nhập mô tả chi tiết sản phẩm</h1>
                                    
                                    </div>
                                    <textarea name="noi_dung" id="noi_dung_content" class="d-none"></textarea>
                                </div>
                            
                                    <div class="mb-3">
                                        <label for="hinh_anh" class="form-label">Hình Ảnh</label>
                                        <img src="{{Storage::url($sanPham->hinh_anh)}}" id="img_danh_muc"  alt="hình ảnh sản phẩm" style="width:100px; ">
                                    </div>

                                    <div class="mb-3">
                                        <label for="hinh_anh" class="form-label">Album Hình Ảnh</label>
                                        <table class="table align-middel table-nowrap mb-0"> 
                                        <tbody id="image-table-body">
                                            @foreach ($sanPham->hinhAnhSanPham as $index => $hinhAnh)
                                            <tr >
                                                <td class="d-flex align-items-center">
                                                    <img src="{{Storage::url($hinhAnh->hinh_anh)}}"  alt="hình ảnh sản phẩm"
                                                    style="width:50px; " class="me-3">
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        </table>
                                        
                                    </div>



                            
                            </div>
                            
                            </form>
                        </div>
                        <hr>
                        <div class="container">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">Tên tài khoản</th>
                                        <th scope="col">Nội dung</th>
                                        <th scope="col">Ngày đăng</th>
                                        <th scope="col">Trạng thái</th> 
                                        <th scope="col">Hành động</th> 
                                    </tr>
                                </thead>
                                <tbody>

                                        @foreach ($binhLuan as $item)
                                        <form action="{{ route('admins.sanphams.updateBinhLuan',$item->id) }}" method="post">
                                            @csrf
                                            @method('PUT')                                        
                                        <tr>
                                            <th scope="row">{{$item->name}}</th>
                                            <td >{{$item->noi_dung}}</td>
                                            <td>{{$item->thoi_gian}}</td>
                                            <td>
                                                <select name="trang_thai" id="" class="form-control">
                                                    {{-- <option value="{{ $list_binh_luan->trang_thai }}">{{ $list_binh_luan->trang_thai == 0 ? "Đã Duyệt" : "Chưa Duyệt" }}</option> --}}
                                        
                                                    @if ($item->trang_thai == 0)
                                                    <option selected value="0">Đã Duyệt</option>                    
                                                    <option value="1">Chưa Duyệt</option>                    
                                                    @else
                                                    <option value="0">Đã Duyệt</option>                    
                                                    <option selected value="1">Chưa Duyệt</option>  
                                                    @endif
                                                </select>

                                            </td>
                                            <td class="d-flex justify-content-center">
                                                <div class="">
                                                    <button type="submit" class="btn btn-success">Cập nhật trạng thái</button>
                                                </div>          
                                            </td>                                     
                                           
                                        </tr>
                                            
                                            
                                        </form>                                        
                                        @endforeach  
                                    </form>      
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

    </div> <!-- container-fluid -->
</div>

@endsection 

@section('js')
<script src="{{asset('assets/admin/libs/quill/quill.core.js')}}"></script>
<script src="{{asset('assets/admin/libs/quill/quill.min.js')}}"></script>
<script>
    document.addEventListener('DOMContentLoaded',function(){

        var quill = new Quill("#quill-editor", {
    theme: "snow",
   
       })
       
    // Hiển thị nội dung cũ
       var old_content = `{!! $sanPham->noi_dung !!}`;
       quill.root.innerHTML = old_content ;
    })

   

</script>
   
@endsection