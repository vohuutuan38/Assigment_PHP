@extends('layout.admin')

@section('title')
    {{ $title }}
@endsection

@section('css')
@endsection

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Chi tiết đơn hàng</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="card-title align-content-center mb-0"> {{ $title }}</h5>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="table-responsive">

                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th class="pro-thumbnail">Thông tin người đặt</th>
                                            <th class="pro-title">Thông tin người nhận</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <ul>
                                                    <p>Tên người đặt: <strong>{{ $donHang->user->name }}</strong> </p>
                                                    <p>Emaul người đặt: <strong>{{ $donHang->user->email }}</strong>
                                                    </p>
                                                    <p>Điện thoại người đặt:
                                                        <strong>{{ $donHang->user->phone }}</strong>
                                                    </p>
                                                    <p>Địa chỉ người đặt:
                                                        <strong>{{ $donHang->user->address }}</strong>
                                                    </p>
                                                </ul>
                                            </td>
                                            <td>
                                                <ul>
                                                    <p>Tên người nhận: <strong>{{ $donHang->ten_nguoi_nhan }}</strong> </p>
                                                    <p>Email người nhận: <strong>{{ $donHang->email_nguoi_nhan }}</strong>
                                                    </p>
                                                    <p>Điện thoại người nhận:
                                                        <strong>{{ $donHang->so_dien_thoai_nguoi_nhan }}</strong>
                                                    </p>
                                                    <p>Địa chỉ người nhận:
                                                        <strong>{{ $donHang->dia_chi_nguoi_nhan }}</strong>
                                                    </p>
                                                    <p>Ngày đặt hàng:
                                                        <strong>{{ $donHang->created_at->format('d-m-Y') }}</strong>
                                                    </p>
                                                    <p>Ghi chú người nhận: <strong>{{ $donHang->ghi_chu }}</strong> </p>
                                                    <p>Trạng thái đơn hàng:
                                                        <strong>{{ $trangThaiDonHang[$donHang->trang_thai_don_hang] }}</strong>
                                                    </p>
                                                    <p>Trạng thái thanh toán:
                                                        <strong>{{ $trangThaiThanhToan[$donHang->trang_thai_thanh_toan] }}</strong>
                                                    </p>
                                                    <p>Tiền Hàng: <strong>{{ number_format($donHang->tien_hang) }}
                                                            đ</strong> </p>
                                                    <p>Tiền ship: <strong>{{ number_format($donHang->tien_ship) }}
                                                            đ</strong> </p>
                                                    <p>Tổng tiền: <strong>{{ number_format($donHang->tong_tien) }}
                                                            đ</strong> </p>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="card-title align-content-center mb-0"> {{ $title }}</h5>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="table-responsive">

                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

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
                                                    <img class="img-fluid" src="{{ Storage::url($sanPham->hinh_anh) }}"
                                                        alt="" width="80px">
                                                </td>
                                                <td>{{ $sanPham->ma_san_pham }}</td>
                                                <td>{{ $sanPham->ten_san_pham }}</td>
                                                <td>{{ number_format($item->don_gia) }} đ</td>
                                                <td>{{ $item->so_luong }}</td>
                                                <td>{{ number_format($item->thanh_tien) }} đ</td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                </ </div> <!-- container-fluid -->
            </div>
        @endsection

        @section('js')
            <script>
                function confirmSubmit(selectElement) {
                    var form = selectElement.form
                    var selectedOption = selectElement.options[selectElement.selectedIndex].text
                    var defaultValue = selectElement.getAttribute('data-default-value')

                    if (confirm('Bạn muốn thay đổi trang thái đơn hàng "' + selectedOption + '" Không ?')) {
                        form.submit()
                    } else {
                        selectElement.value = defaultValue
                    }
                }
            </script>
        @endsection
