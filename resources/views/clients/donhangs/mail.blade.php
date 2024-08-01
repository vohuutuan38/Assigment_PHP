@component('mail::message')
    # Xác nhận đơn hàng

    Xin chào {{$donHang->ten_nguoi_nhan}},

    Cảm ơn bạn đã đặt hàng từ của hàng mobile shop của chúng tôi, Đây là thông tin đơn hàng của bạn

    *** Mã đơn hàng : ** {{$donHang->ma_don_hang}}


    *** Sản phẩm đã đặt : **
    @foreach ($donHang->chiTietDonHang as $chiTiet)
        - {{$chiTiet->sanPham->ten_san_pham}} x {{$chiTiet->so_luong}} :  {{number_format($chiTiet->thanh_tien)}} VNĐ
    @endforeach


    *** Tổng tiền : **  {{number_format($donHang->tong_tien)}} VNĐ

    Cảm ơn bạn đã mua tại mobile shop của chúng tôi !
@endcomponent