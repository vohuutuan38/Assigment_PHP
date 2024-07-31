@extends('layout.client')

@section('css')
@endsection

@section('content')
    <main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">my-account</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- my account wrapper start -->
        <div class="my-account-wrapper section-padding">
            <div class="container">
                <div class="section-bg-color">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- My Account Page Start -->
                            <div class="myaccount-page-wrapper">
                                <!-- My Account Tab Menu Start -->
                                <div class="row">
                                    <div class="col-lg-3 col-md-4">
                                        <div class="myaccount-tab-menu nav" role="tablist">
                                            <a href="#account-info" data-bs-toggle="tab"><i class="fa fa-user"></i> Account
                                                Details</a>
                                            <a href="#payment-method" data-bs-toggle="tab"><i class="fa fa-key"></i>
                                                Changes
                                                Password</a>

                                        </div>
                                    </div>
                                    <!-- My Account Tab Menu End -->

                                    <!-- My Account Tab Content Start -->
                                    <div class="col-lg-9 col-md-8">
                                        <div class="tab-content" id="myaccountContent">

                                            <div class="tab-pane fade active show" id="account-info" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h5>Account Details</h5>
                                                    <div class="account-details-form">
                                                        <form action="{{ route('account.update') }}" method="POST">
                                                            @csrf
                                                            <div class="single-input-item">
                                                                <label for="display-name" class="required">Display
                                                                    Name</label>
                                                                <input type="text" name="name"
                                                                    value="{{ $name }}" id="display-name"
                                                                    placeholder="Display Name" />
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="first-name"
                                                                            class="required">Phone</label>
                                                                        <input type="text" name="phone"
                                                                            value="{{ $phone = $phone ? $phone : '' }}"
                                                                            id="first-name" placeholder="First Name" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="last-name"
                                                                            class="required">Address</label>
                                                                        <input type="text" name="address"
                                                                            value="{{ $address = $address ? $address : '' }}"
                                                                            id="last-name" placeholder="Last Name" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="single-input-item">
                                                                <label for="email" class="required">Email
                                                                    Addres</label>
                                                                <input type="email" value="{{ $email }}"
                                                                    name="email" id="email"
                                                                    placeholder="Email Address" />
                                                            </div>
                                                            <div class="single-input-item">
                                                                <button class="btn btn-sqr">Save Changes</button>
                                                            </div>
                                                        </form>
                                                        <div style="margin-top: 50px">
                                                            <h5>Delete Account</h5>
                                                            <div class="welcome">
                                                                <p>Hello, <strong>Erik Jhonson</strong> (If Not
                                                                    <strong>Jhonson
                                                                        !</strong><a href="login-register.html"
                                                                        class="logout">
                                                                        Logout</a>)
                                                                </p>
                                                            </div>
                                                            <p class="mb-0">From your account dashboard. you can easily
                                                                check
                                                                &
                                                                view your recent orders, manage your shipping and billing
                                                                addresses
                                                                and edit your password and account details.</p>
                                                            <div class="single-input-item">
                                                                <form
                                                                    onsubmit="return confirm('Do you want to delete your account ?')"
                                                                    action="{{ route('account.destroy') }}" method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sqr"
                                                                        style="background-color: red">Delete
                                                                        Account</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- Single Tab Content End -->
                                            @if (session('error'))
                                                <script>
                                                    alert("{{ session('error') }}");
                                                </script>
                                            @endif
                                            <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h5>Changes Password</h5>
                                                    <form action="{{ route('account.changePassword') }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="single-input-item">
                                                            <label for="current-pwd" class="required">Current
                                                                Password</label>
                                                            <input type="password" required name="oldPassword"
                                                                id="current-pwd" placeholder="Current Password" />
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="new-pwd" class="required">New
                                                                        Password</label>
                                                                    <input required type="password" name="newPassword"
                                                                        id="new-pwd" placeholder="New Password" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="confirm-pwd" class="required">Confirm
                                                                        Password</label>
                                                                    <input type="password" name="newPassword_confirmation"
                                                                        id="confirm-pwd" required
                                                                        placeholder="Confirm Password" />
                                                                </div>
                                                            </div>
                                                            <div class="single-input-item">
                                                                <button type="submit" class="btn btn-sqr">Changes
                                                                    Password</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- My Account Tab Content End -->
                                </div>
                            </div> <!-- My Account Page End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- my account wrapper end -->
    </main>
@endsection

@section('js')
@endsection
