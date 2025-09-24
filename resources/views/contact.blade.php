@extends('layouts.app')
@section('title', 'Liên hệ')

{{-- CSS & JS CKEditor --}}
@section('linkcss')
    <link rel="stylesheet" href="{{ asset('ckeditor5-builder-46.1.1/ckeditor5/ckeditor5.css') }}">
    <script src="{{ asset('ckeditor5-builder-46.1.1/ckeditor5/ckeditor5.js') }}"></script>
@endsection

@section('content')
    {{-- Title area --}}
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Liên hệ</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Contact area --}}
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <div class="contact-form bg-white shadow p-4 rounded">
                        <h3 class="mb-4">Gửi liên hệ cho chúng tôi</h3>

                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $err)
                                        <li>{{ $err }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="name">Tên</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="email">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="phone">Số điện thoại</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="subject">Tiêu đề</label>
                                <input type="text" name="subject" class="form-control" value="{{ old('subject') }}">
                            </div>

                            {{-- Editor --}}
                            <div class="main-container">
                                <div class="editor-container editor-container_classic-editor" id="editor-container">
                                    <div class="editor-container__editor">
                                        <textarea id="editor" name="message"value="{{ old('message') }}"></textarea>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Gửi liên hệ</button>
                        </form>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12">
                    <div class="contact-info bg-light p-4 rounded shadow">
                        <h3 class="mb-4">Thông tin liên hệ</h3>
                        <p><i class="fa fa-map-marker"></i> 123 Đường ABC, Quận 1, TP.HCM</p>
                        <p><i class="fa fa-envelope"></i> support@example.com</p>
                        <p><i class="fa fa-phone"></i> 0123 456 789</p>
                        <hr>
                        <h4>Giờ làm việc</h4>
                        <p>Thứ 2 - Thứ 6: 8h - 17h</p>
                        <p>Thứ 7: 8h - 12h</p>
                        <p>Chủ nhật: Nghỉ</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('linkjs')
    {{-- Import map CKEditor --}}
    <script type="importmap">
    {
        "imports": {
            "ckeditor5": "/ckeditor5-builder-46.1.1/ckeditor5/ckeditor5.js",
            "ckeditor5/": "/ckeditor5-builder-46.1.1/ckeditor5/"
        }
    }
    </script>

    {{-- Gọi file JS của bạn --}}
    <script type="module" src="{{ asset('assets/js/main.js') }}"></script>

    {{-- Validate form --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('form');
            const phoneInput = form.querySelector('input[name="phone"]');
            const emailInput = form.querySelector('input[name="email"]');

            form.addEventListener('submit', function (e) {
                // Kiểm tra số điện thoại 10 số (nếu có nhập)
                const phoneValue = phoneInput.value.trim();
                const phoneRegex = /^[0-9]{10}$/;

                if (phoneValue && !phoneRegex.test(phoneValue)) {
                    e.preventDefault();
                    alert('Số điện thoại phải đúng 10 chữ số.');
                    phoneInput.focus();
                    return;
                }

                // Kiểm tra email hợp lệ
                const emailValue = emailInput.value.trim();
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                if (!emailRegex.test(emailValue)) {
                    e.preventDefault();
                    alert('Email không hợp lệ.');
                    emailInput.focus();
                    return;
                }
            });
        });
    </script>
@endsection

