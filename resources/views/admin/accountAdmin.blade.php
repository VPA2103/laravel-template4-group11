@extends('layouts.app') {{-- Nếu bạn dùng layout chung --}}

@section('title', 'Trang tài khoản')

@section('content')
<div class="container mx-auto mt-10 p-6 bg-white rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Thông tin tài khoản</h2>

    <p><strong>Họ và tên:</strong> {{ Auth::user()->name }}</p>
    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
    <p><strong>Loại nhân viên:</strong> {{ Auth::user()->loainhanvien }}</p>

    <div class="mt-6">
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
            Đăng xuất
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </div>
</div>
@endsection
