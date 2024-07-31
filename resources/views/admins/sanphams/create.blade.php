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
                <h4 class="fs-18 fw-semibold m-0">Quản lý danh mục sản phẩm</h4>
            </div>
        </div>
 <div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"> {{$title}}</h5>
            </div><!-- end card header -->

            <div class="card-body">
                <form action="{{route('admins.sanphams.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                        <div class="col-lg-4 ">
                            <div class="mb-3">
                                <label for="trang_thai" class="form-label">Mã sản phẩm</label>
                                <input type="text" id="ma_san_pham" name="ma_san_pham" class="form-control @error('ma_san_pham') is-invalid   @enderror" value="{{old('ma_san_pham')}}" >
                                @error('ma_san_pham')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>  

                            <div class="mb-3">
                                <label for="trang_thai" class="form-label">Tên sản phẩm</label>
                                <input type="text" id="ten_san_pham" name="ten_san_pham" class="form-control @error('ten_san_pham') is-invalid   @enderror" value="{{old('ten_san_pham')}}" >
                                @error('ten_san_pham')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>  

                            <div class="mb-3">
                                <label for="trang_thai" class="form-label">Giá sản phẩm</label>
                                <input type="number" id="gia_san_pham" name="gia_san_pham" class="form-control @error('gia_san_pham') is-invalid   @enderror" value="{{old('gia_san_pham')}}" >
                                @error('gia_san_pham')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>  

                            <div class="mb-3">
                                <label for="trang_thai" class="form-label">Giá khuyến mãi</label>
                                <input type="number" id="gia_khuyen_mai" name="gia_khuyen_mai" class="form-control @error('gia_khuyen_mai') is-invalid   @enderror" value="{{old('gia_khuyen_mai')}}" >
                                @error('gia_khuyen_mai')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>  

                            <div class="mb-3">
                                <label for="trang_thai" class="form-label" >Danh mục</label>
                               <select name="danh_muc_id" id="" class="form-select @error('danh_muc_id') is-invalid   @enderror">
                                <option  selected>---Chọn Danh Mục---</option>
                                @foreach ($listDanhMuc as $item)
                                <option value="{{$item->id}}" {{old('danh_muc_id')== $item->id ? 'selected' : ''}}>{{$item->ten_danh_muc}}</option>
                                @endforeach
                               </select>
                                @error('danh_muc_id')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>  

                            <div class="mb-3">
                                <label for="trang_thai" class="form-label">Số lượng</label>
                                <input type="number" id="so_luong" name="so_luong" class="form-control @error('so_luong') is-invalid   @enderror" value="{{old('so_luong')}}">
                                @error('so_luong')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>  

                            <div class="mb-3">
                                <label for="trang_thai" class="form-label">Ngày Nhập</label>
                                <input type="date" id="ngay_nhap" name="ngay_nhap" class="form-control @error('ngay_nhap') is-invalid   @enderror" value="{{old('ngay_nhap')}}" >
                                @error('ngay_nhap')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div> 

                            <div class="mb-3">
                                <label for="mo_ta_ngan" class="form-label">Mô tả ngắn</label>
                                <textarea name="mo_ta_ngan" id="mo_ta_ngan" rows="3" class="form-control">{{old('mo_ta_ngan')}}</textarea>
                                @error('mo_ta_ngan')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div> 

                            <div class="col-sm-10 mb-3 d-flex gap-2">
                                <label for="simpleinput" class="form-label">Trạng Thái</label>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="is_type" id="gridRadios1" value="1" >
                                    <label class="form-check-label" for="gridRadios1">
                                        Hiển Thị
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="is_type" id="gridRadios2" value="0">
                                    <label class="form-check-label" for="gridRadios2">
                                        Ẩn
                                    </label>
                                </div>
                              
                          </div>
                             
                          <label class="form-check-label" for="gridRadios2">
                                Tùy chỉnh khác
                          </label>
                          <div class="form-switch mb-2 d-flex justify-content-between">
                          
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"  id="is_new"  name="is_new" checked>
                                <label class="form-check-label" for="is_new">New</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"  id="is_hot" name="is_hot" checked>
                                <label class="form-check-label" for="is_hot">Hot</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"  id="is_hot_deal" name="is_hot_deal" checked>
                                <label class="form-check-label" for="is_hot_deal">Hot Deal</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"  id="is_show_home" name="is_show_home" checked>
                                <label class="form-check-label" for="is_show_home">Show Home</label>
                            </div>  
                        </div>


                        </div>

                      
                          
                     

                    <div class="col-lg-8">
                        <div class="mb-3">
                            <label class="form-label" for="">Mô tả chi tiết sản phẩm</label>
                            <div id="quill-editor" style="height: 400px;">
                                <h1>Nhập mô tả chi tiết sản phẩm</h1>
                               
                            </div>
                            <textarea name="noi_dung" id="noi_dung_content"  class="d-none"></textarea>
                        </div>
                    
                            <div class="mb-3">
                                <label for="hinh_anh" class="form-label">Hình Ảnh</label>
                                <input type="file" id="hinh_anh" name="hinh_anh" class="form-control " placeholder="HÌnh ảnh" onchange="showImage(event)">
                                <img src="" id="img_danh_muc"  alt="hình ảnh sản phẩm" style="width:100px; display: none">
                            </div>

                            <div class="mb-3">
                                <label for="hinh_anh" class="form-label">Album Hình Ảnh</label>
                                <i id="add-row" class="mdi mdi-plus text-muted fs-18 rounded-2 border ms-3 p-1 " style="cursor:pointer"></i>
                                <table class="table align-middel table-nowrap mb-0"> 
                                   <tbody id="image-table-body">
                                    <tr >
                                        <td class="d-flex align-items-center">
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS0Wr3oWsq6KobkPqznhl09Wum9ujEihaUT4Q&s" id="preview_0"  alt="hình ảnh sản phẩm"
                                             style="width:50px; " class="me-3">
                                             <input type="file" id="hinh_anh" name="list_hinh_anh[id_0]" class="form-control " placeholder="HÌnh ảnh" onchange="previewImage(this,0)">
                                        </td>
                                        <td>
                                            <i class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1 " style="cursor:pointer" ></i>
                                        </td>
                                    </tr>
                                   </tbody>
                                </table>
                                
                            </div>



                      
                    </div>
                    <div class="d-flex justify-content-center ">
                        <button type="submit" class="btn btn-primary">Thêm Danh mục</button>
                     </div>
                    </form>
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
        

    function showImage(event){
        const img_danh_muc = document.getElementById('img_danh_muc');

        const file = event.target.files[0];

        const reader = new FileReader();

        reader.onload = function(){
            img_danh_muc.src = reader.result;
            img_danh_muc.style.display = 'block';
        }

        if(file){
           reader.readAsDataURL(file);
        }

    }
</script>

<script>
    document.addEventListener('DOMContentLoaded',function(){

        var quill = new Quill("#quill-editor", {
    theme: "snow",
   
       })
       
// Hiển thị nội dung cũ
       var old_content = `{!! old('noi_dung') !!}`;
       quill.root.innerHTML = old_content ;

// Cập nhật lại textarea ẩn khi nội dung của qill-editer thay đổi
     quill.on('text-change',function(){
        var html = quill.root.innerHTML;
        document.getElementById('noi_dung_content').value = html;
     })
    })

   

</script>

{{-- thêm ảnh --}}
<script>
        document.addEventListener('DOMContentLoaded',function(){
           var rowCount = 1;

           document.getElementById('add-row').addEventListener('click',function(){
           var tableBody =document.getElementById('image-table-body')

            var newRow = document.createElement('tr');

           newRow.innerHTML =`
            <td class="d-flex align-items-center">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS0Wr3oWsq6KobkPqznhl09Wum9ujEihaUT4Q&s" id="preview_${rowCount}"  alt="hình ảnh sản phẩm"
                    style="width:50px; " class="me-3">
                    <input type="file" id="hinh_anh" name="list_hinh_anh[id_${rowCount}]" class="form-control " placeholder="HÌnh ảnh" onchange="previewImage(this,${rowCount})">
            </td>
            <td>
                <i class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1 " style="cursor:pointer" onclick="removeRow(this)"></i>
            </td>
            `;
            tableBody.appendChild(newRow);
            rowCount++;
           })


        });

       function previewImage(input,rowIndex){
        if(input.files && input.files[0]){
            const reader = new FileReader();

            reader.onload = function(e){
               document.getElementById(`preview_${rowIndex}`).setAttribute('src',e.target.result)
            }

            reader.readAsDataURL(input.files[0]);
            
        }
        }

        function removeRow(item){
          var row = item.closest('tr');
          row.remove();
        }

</script>

   
@endsection