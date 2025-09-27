@extends('layouts.app')
@section('title', 'Đăng nhập')

@section('content')
    {{-- Title area --}}
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Đăng nhập</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Login area --}}
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container min-vh-100 d-flex align-items-center">
            <div class="row justify-content-start w-100">
                <div class="col-md-6 col-sm-12" style="margin-left: 8cm;">
                    <div class="login-form bg-white shadow p-4 rounded">
                        <h3 class="mb-4 text-center">Đăng nhập</h3>

                        <form action="{{ route('login') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" required autofocus>
                                @error('email')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Mật khẩu</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" required>
                                @error('password')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="d-grid gap-2 mt-3">
                                <button type="submit" class="btn btn-primary">Đăng nhập</button>
                                <a href="{{ route('register.form') }}" class="btn btn-success">Đăng ký</a>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection