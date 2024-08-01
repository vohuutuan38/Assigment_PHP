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
                    <h4 class="fs-18 fw-semibold m-0">Quản lý người dùng</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0"> {{ $title }}</h5>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <form action="{{ route('admins.user.update', $data->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="trang_thai" class="form-label">Tên</label>
                                            <input type="text" id="ten_danh_muc" name="name"
                                                class="form-control @error('ten_danh_muc') is-invalid   @enderror"
                                                value="{{ $data->name }}" placeholder="Tên">
                                            {{-- @error('ten_danh_muc')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror --}}
                                        </div>
                                        <div class="mb-3">
                                            <label for="trang_thai" class="form-label">Địa chỉ</label>
                                            <input type="text" id="ten_danh_muc" name="address"
                                                class="form-control @error('ten_danh_muc') is-invalid   @enderror"
                                                value="{{ $data->address }}" placeholder="Địa chỉ">
                                            {{-- @error('ten_danh_muc')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror --}}
                                        </div>
                                        <div class="mb-3">
                                            <label for="trang_thai" class="form-label">Quyền hạn</label><br>
                                            <select class="form-control name="role" id="">
                                                <option value="Admin" @selected($data->role == 'Admin')>Admin</option>
                                                <option value="User" @selected($data->role == 'User')>User</option>
                                            </select>
                                            {{-- @error('ten_danh_muc')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror --}}
                                        </div>
                                    </div>





                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="trang_thai" class="form-label">Email</label>
                                            <input type="email" id="ten_danh_muc" name="email"
                                                class="form-control @error('ten_danh_muc') is-invalid   @enderror"
                                                value="{{ $data->email }}" placeholder="Email">
                                            {{-- @error('ten_danh_muc')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror --}}
                                        </div>
                                        <div class="mb-3">
                                            <label for="trang_thai" class="form-label">Số điện thoại</label>
                                            <input type="text" id="ten_danh_muc" name="phone"
                                                class="form-control @error('ten_danh_muc') is-invalid   @enderror"
                                                value="{{ $data->phone }}" placeholder="Số điện thoại">
                                            {{-- @error('ten_danh_muc')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror --}}
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center ">
                                        <button type="submit" class="btn btn-primary">Sửa</button>
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
    <script>
        function showImage(event) {
            const img_danh_muc = document.getElementById('img_danh_muc');

            const file = event.target.files[0];

            const reader = new FileReader();

            reader.onload = function() {
                img_danh_muc.src = reader.result;
                img_danh_muc.style.display = 'block';
            }

            if (file) {
                reader.readAsDataURL(file);
            }

        }
    </script>
@endsection
