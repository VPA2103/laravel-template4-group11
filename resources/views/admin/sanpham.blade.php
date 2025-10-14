@extends('layouts.admin')
<style>
    .text-right {
        text-align: right;
    }
</style>
@yield('css')
@section('content')
    <div class="main-content-inner">
        <div class="main-content-wrap">


            <div class="wg-box">
                <div class="flex items-center justify-between gap10 flex-wrap">
                    <div class="wg-filter flex-grow">
                        <form class="form-search">
                            <fieldset class="name">
                                <input type="text" placeholder="Search here..." class="" name="name" tabindex="2" value=""
                                    aria-required="true" required="">
                            </fieldset>
                            <div class="button-submit">
                                <button class="" type="submit"><i class="icon-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="text-right">
                        <a href="{{route('admin.sanpham.add')  }}">
                            <button class="tf-button style-1 w208 ">
                                Thêm Mới Sản Phẩm
                            </button>
                        </a>

                    </div>
                </div>
                <div class="table-responsive">
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Ảnh Sản Phẩm</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Giá</th>
                                <th>Số Lượng Tồn</th>
                                <th>Slug</th>
                                <th>Loại Sản Phẩm</th>
                                <th>Mô Tả</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sanphams as $sanpham)
                                <tr>
                                    <td>{{$sanpham->MaSanPham}}</td>
                                    <td class="pname">
                                        <div class="image">
                                            <img src="{{asset('assets/products/thumbnails/')}}/{{$sanpham->AnhSanPham}}"
                                                alt="{{$sanpham->TenSanPham}}" class="image" style="width: 30px; height: 30px;">
                                        </div>
                                    </td>
                                    <td>{{$sanpham->TenSanPham}}</td>
                                    <td>{{$sanpham->Gia}}VND</td>
                                    <td>{{$sanpham->SoLuongTon}}</td>
                                    <td>{{$sanpham->Slug}}</td>
                                    <td>{{$sanpham->MaLoaiSanPham}}</td>
                                    <td>{{$sanpham->MoTa}}</td>
                                    <td>
                                        <div>
                                            <button>Xem</button>
                                        </div>
                                        <div>
                                            <button>Sửa</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function () {
            $('.delete').on('click', function (e) {
                e.preventDefault();
                var form = $(this).closest('form');
                swal({
                    title: 'Are you sure?',
                    text: "You want to delete this product?",
                    type: 'warning',
                    buttons: ["Cancel", "Yes"],
                    confirmButtonColor: '#dc3545',
                }).then(function (result) {
                    if (result) {
                        form.submit();
                    }
                })
            })
        })
    </script>
@endpush