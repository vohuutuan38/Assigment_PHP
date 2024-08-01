@extends('layout.client')

@section('css')
    
@endsection

@section('content')
<main>
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-wrap">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                           
                            <li class="breadcrumb-item active" aria-current="page">Order detail</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="cart-main-wrapper section-padding">
    <div class="container">
        <div class="section-bg-color">

            <div class="row">
                <div class="col-lg-12">
                    <div class="myaccount-content">
                        <h5>Thông tin đơn hàng : <span>{{$donHang->ma_don_hang}}</span></h5>
                        <div class="welcome">
                            <p>Tên người nhận:  <strong>{{$donHang->ten_nguoi_nhan}}</strong>  </p>
                            <p>Emaul người nhận:  <strong>{{$donHang->email_nguoi_nhan}}</strong>  </p>
                            <p>Điện thoại người nhận:  <strong>{{$donHang->so_dien_thoai_nguoi_nhan}}</strong>  </p>
                            <p>Địa chỉ người nhận:  <strong>{{$donHang->dia_chi_nguoi_nhan}}</strong>  </p>
                            <p>Ngày đặt hàng:  <strong>{{$donHang->created_at->format('d-m-Y')}}</strong>  </p>
                            <p>Ghi chú người nhận:  <strong>{{$donHang->ghi_chu}}</strong>  </p>
                            <p>Trạng thái đơn hàng:  <strong>{{$trangThaiDonHang[$donHang->trang_thai_don_hang]}}</strong>  </p>
                            <p>Trạng thái thanh toán:  <strong>{{$trangThaiThanhToan[$donHang->trang_thai_thanh_toan]}}</strong>  </p>
                            <p>Tiền Hàng:  <strong>{{number_format($donHang->tien_hang)}} đ</strong>  </p>
                            <p>Tiền ship:  <strong>{{number_format($donHang->tien_ship)}} đ</strong>  </p>
                            <p>Tổng tiền:  <strong>{{number_format($donHang->tong_tien)}} đ</strong>  </p>
                           
                        </div>
                        
                    </div>

                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="myaccount-content">
                        <div class="myaccount-table table-responsive text-center">
                            <table class="table table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Hình Ảnh</th>
                                        <th>mã sản phẩm</th>
                                        <th>tên sản phẩm</th>
                                        <th>đơn giá</th>
                                        <th>số lượng</th>
                                        <th>thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($donHang->chiTietDonHang as $item)
                                        @php
                                         $sanPham = $item->sanPham;   
                                        @endphp
                                    <tr>
                                        <td>
                                            <img class="img-fluid" src="{{Storage::url($sanPham->hinh_anh)}}" alt="" width="80px">
                                        </td>
                                        <td>{{$sanPham->ma_san_pham}}</td>
                                        <td>{{$sanPham->ten_san_pham}}</td>
                                        <td>{{number_format($item->don_gia)}} đ</td>
                                        <td>{{$item->so_luong}}</td>
                                        <td>{{number_format($item->thanh_tien)}} đ</td>
                                        
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            
        </div>
    </div>
</div>
</main>
@endsection

@section('js')

@endsection