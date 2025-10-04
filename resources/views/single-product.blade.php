@extends('layouts.app')
@section('title', 'Chi tiết sản phẩm')
@section('content')

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            {{-- Sidebar --}}
            <div class="col-md-4">
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Tìm kiếm sản phẩm</h2>
                    <form action="">
                        <input type="text" placeholder="Search products...">
                        <input type="submit" value="Tìm kiếm">
                    </form>
                </div>

                {{-- Gợi ý: có thể hiển thị sản phẩm khác ở đây sau nếu muốn --}}
            </div>

            {{-- Chi tiết sản phẩm --}}
            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="product-breadcroumb">
                        <a href="{{ route('home') }}">Trang chủ</a>
                        <a href="#">Loại: {{ $sanpham->loaiSanPham->TenLoaiSanPham ?? 'Không xác định' }}</a>
                        <a href="#">{{ $sanpham->TenSanPham }}</a>
                    </div>

                    <div class="row">
                        {{-- Hình ảnh --}}
                        <div class="col-sm-6">
                            <div class="product-images">
                                <div class="product-main-img">
                                    <img src="{{ asset('assets/products/' . $sanpham->AnhSanPham) }}" alt="{{ $sanpham->TenSanPham }}">
                                </div>
                            </div>
                        </div>

                        {{-- Thông tin sản phẩm --}}
                        <div class="col-sm-6">
                            <div class="product-inner">
                                <h2 class="product-name">{{ $sanpham->TenSanPham }}</h2>

                                <div class="product-inner-price">
                                    <ins>{{ number_format($sanpham->Gia, 0, ',', '.') }} VNĐ</ins>
                                </div>

                                <form action="#" class="cart">
                                    <div class="quantity">
                                        <input type="number" class="input-text qty text" value="1" min="1" name="quantity">
                                    </div>
                                    <button class="add_to_cart_button" type="submit">Thêm vào giỏ hàng</button>
                                </form>

                                <div class="product-inner-category">
                                    <p>
                                        Loại sản phẩm:
                                        <a href="#">
                                            {{ $sanpham->loaiSanPham->TenLoaiSanPham ?? 'Không xác định' }}
                                        </a>
                                    </p>
                                    <p>
                                        Số lượng còn:
                                        <strong>{{ $sanpham->SoLuongTon }}</strong>
                                    </p>
                                </div>

                                <div role="tabpanel">
                                    <ul class="product-tab" role="tablist">
                                        <li role="presentation" class="active">
                                            <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Mô tả</a>
                                        </li>
                                        <li role="presentation">
                                            <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Đánh giá</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="home">
                                            <h2>Mô tả sản phẩm</h2>
                                            <p>{{ $sanpham->MoTa ?? 'Không có mô tả' }}</p>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="profile">
                                            <h2>Đánh giá</h2>
                                            <div class="submit-review">
                                                <p><label for="name">Tên</label> <input name="name" type="text"></p>
                                                <p><label for="email">Email</label> <input name="email" type="email"></p>
                                                <div class="rating-chooser">
                                                    <p>Đánh giá của bạn</p>
                                                    <div class="rating-wrap-post">
                                                        @for($i = 0; $i < 5; $i++)
                                                            <i class="fa fa-star"></i>
                                                        @endfor
                                                    </div>
                                                </div>
                                                <p><label for="review">Nhận xét</label>
                                                    <textarea name="review" cols="30" rows="10"></textarea>
                                                </p>
                                                <p><input type="submit" value="Gửi"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- Sản phẩm liên quan (nếu cần) --}}
                    {{-- Bỏ dữ liệu tĩnh, có thể bổ sung sau từ DB --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
