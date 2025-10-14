@extends('layouts.admin')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Thêm sản phẩm</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="{{ route('admin.index') }}">
                        <div class="text-tiny">Dashboard</div>
                    </a>
                </li>
            </ul>
        </div>

        <form class="tf-section-2 form-add-product" method="POST" enctype="multipart/form-data"
              action="{{ route('admin.sanpham.store') }}">
            @csrf

            <div class="wg-box">
                {{-- Tên sản phẩm --}}
                <fieldset class="name">
                    <div class="body-title mb-10">Tên sản phẩm <span class="tf-color-1">*</span></div>
                    <input class="mb-10" type="text" placeholder="Nhập tên sản phẩm" name="TenSanPham"
                           value="{{ old('TenSanPham') }}" required>
                </fieldset>
                @error('TenSanPham')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror

                {{-- Slug --}}
                <fieldset class="name">
                    <div class="body-title mb-10">Slug <span class="tf-color-1">*</span></div>
                    <input class="mb-10" type="text" placeholder="Tự động sinh từ tên sản phẩm" name="Slug"
                           value="{{ old('Slug') }}" readonly required>
                </fieldset>
                @error('Slug')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror

                {{-- Loại sản phẩm --}}
                <fieldset class="loaisanpham">
                    <div class="body-title mb-10">Loại sản phẩm <span class="tf-color-1">*</span></div>
                    <div class="select">
                        <select name="MaLoaiSanPham" required>
                            <option value="">-- Chọn loại sản phẩm --</option>
                            @foreach($loaisanphams as $loaisanpham)
                                <option value="{{ $loaisanpham->MaLoaiSanPham }}">{{ $loaisanpham->TenLoaiSanPham }}</option>
                            @endforeach
                        </select>
                    </div>
                </fieldset>
                @error('MaLoaiSanPham')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror

                {{-- Mô tả --}}
                <fieldset class="mota">
                    <div class="body-title mb-10">Mô tả <span class="tf-color-1">*</span></div>
                    <textarea class="mb-10" name="MoTa" placeholder="Nhập mô tả sản phẩm" required>{{ old('MoTa') }}</textarea>
                </fieldset>
                @error('MoTa')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="wg-box">
                {{-- Ảnh đại diện --}}
                <fieldset>
                    <div class="body-title">Ảnh sản phẩm <span class="tf-color-1">*</span></div>
                    <div class="upload-image flex-grow">
                        <div class="item" id="imgpreview" style="display:none">
                            <img src="" class="effect8" alt="">
                        </div>
                        <div id="upload-file" class="item up-load">
                            <label class="uploadfile" for="myFile">
                                <span class="icon"><i class="icon-upload-cloud"></i></span>
                                <span class="body-text">Kéo ảnh vào đây hoặc <span class="tf-color">click để chọn</span></span>
                                <input type="file" id="myFile" name="AnhSanPham" accept="image/*" required>
                            </label>
                        </div>
                    </div>
                </fieldset>
                @error('AnhSanPham')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror

                {{-- Giá bán --}}
                <div class="cols gap22">
                    <fieldset class="giaban">
                        <div class="body-title mb-10">Giá bán <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="number" placeholder="Nhập giá bán" name="Gia"
                               value="{{ old('Gia') }}" required>
                    </fieldset>
                    @error('Gia')
                        <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Số lượng tồn --}}
                <div class="cols gap22">
                    <fieldset class="name">
                        <div class="body-title mb-10">Số lượng tồn <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="number" placeholder="Nhập số lượng tồn" name="SoLuongTon"
                               value="{{ old('SoLuongTon') }}" required>
                    </fieldset>
                    @error('SoLuongTon')
                        <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="cols gap10">
                    <button class="tf-button w-full" type="submit">Thêm sản phẩm</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(function () {
    // Preview ảnh chính
    $('#myFile').on('change', function () {
        const [file] = this.files;
        if (file) {
            $("#imgpreview img").attr("src", URL.createObjectURL(file));
            $("#imgpreview").show();
        }
    });


    // Tự sinh slug khi nhập tên sản phẩm
    $("input[name='TenSanPham']").on('keyup change', function () {
        $("input[name='Slug']").val(StringToSlug($(this).val()));
    });

    // Hàm tạo slug chuẩn tiếng Việt
    function StringToSlug(str) {
        str = str.trim().toLowerCase();
        var from = "àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ";
        var to   = "aaaaaaaaaaaaaaaaaeeeeeeeeeeeiiiiiooooooooooooooooouuuuuuuuuuuyyyyyd";
        for (var i = 0, l = from.length; i < l; i++) {
            str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
        }
        return str.replace(/[^a-z0-9 -]/g, '')
                  .replace(/\s+/g, '-')
                  .replace(/-+/g, '-');
    }
});
</script>
@endpush
