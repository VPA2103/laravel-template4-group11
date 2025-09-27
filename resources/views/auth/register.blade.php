@extends('layouts.app')

@section('title', 'Đăng ký tài khoản')

@section('content')
<div class="container mx-auto mt-10 max-w-md p-6 bg-white shadow rounded">
    <h2 class="text-2xl font-bold mb-6 text-center">Tạo tài khoản mới</h2>

    @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
    @csrf
    <input type="text" name="name" value="{{ old('name') }}" placeholder="Họ và tên">
    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email">
    <input type="password" name="password" placeholder="Mật khẩu">
    <input type="password" name="password_confirmation" placeholder="Xác nhận mật khẩu">
    <button type="submit">Đăng ký</button>
</form>

</div>
@endsection
