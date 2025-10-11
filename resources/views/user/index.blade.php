@extends('layouts.app')

@section('title', 'Thông tin tài khoản')

@section('content')
<style>
    .profile-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 20px 20px 0 0;
        padding: 3rem 2rem 2rem;
        position: relative;
        overflow: hidden;
    }
    
    .profile-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 400px;
        height: 400px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
    }
    
    .avatar-wrapper {
        position: relative;
        display: inline-block;
    }
    
    .avatar-img {
        width: 140px;
        height: 140px;
        border: 5px solid white;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        object-fit: cover;
    }
    
    .profile-name {
        color: white;
        font-weight: 700;
        font-size: 2rem;
        margin-bottom: 0.5rem;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }
    
    .profile-role {
        color: rgba(255, 255, 255, 0.9);
        font-size: 1.1rem;
    }
    
    .info-card {
        background: white;
        border-radius: 15px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }
    
    .info-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }
    
    .icon-email {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
    }
    
    .icon-phone {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        color: white;
    }
    
    .icon-address {
        background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        color: white;
    }
    
    .icon-date {
        background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        color: white;
    }
    
    .info-label {
        font-size: 0.85rem;
        color: #6c757d;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 0.5rem;
    }
    
    .info-value {
        font-size: 1.1rem;
        color: #2d3748;
        font-weight: 500;
    }
    
    .status-badge {
        display: inline-flex;
        align-items: center;
        padding: 0.5rem 1.2rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.9rem;
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        color: white;
        box-shadow: 0 4px 15px rgba(17, 153, 142, 0.3);
    }
    
    .status-badge::before {
        content: '●';
        margin-right: 0.5rem;
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }
    
    .btn-logout {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        border: none;
        padding: 0.8rem 2.5rem;
        font-weight: 600;
        font-size: 1rem;
        border-radius: 50px;
        color: white;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(245, 87, 108, 0.4);
    }
    
    .btn-logout:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(245, 87, 108, 0.5);
        background: linear-gradient(135deg, #f5576c 0%, #f093fb 100%);
        color: white;
    }
    
    .main-card {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
    }
</style>

<div class="container my-5">
    <div class="card main-card">
        <!-- Header với gradient -->
        <div class="profile-header text-center">
            <div class="avatar-wrapper">
                <img src="{{ Auth::user()->avatar ?? asset('images/default-avatar.png') }}" 
                     alt="Avatar" 
                     class="rounded-circle avatar-img">
            </div>
            <h2 class="profile-name mt-3">{{ Auth::user()->name }}</h2>
            <p class="profile-role">{{ Auth::user()->loainhanvien ?? 'Người dùng' }}</p>
        </div>

        <!-- Nội dung -->
        <div class="card-body p-4 p-md-5">
            <!-- Thông tin liên hệ -->
            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <div class="info-card">
                        <div class="icon-email info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="info-label">Email</div>
                        <div class="info-value">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="info-card">
                        <div class="icon-phone info-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="info-label">Số điện thoại</div>
                        <div class="info-value">{{ Auth::user()->phone ?? 'Chưa cập nhật' }}</div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="info-card">
                        <div class="icon-address info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="info-label">Địa chỉ</div>
                        <div class="info-value">{{ Auth::user()->address ?? 'Chưa có thông tin' }}</div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="info-card">
                        <div class="icon-date info-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div class="info-label">Ngày tham gia</div>
                        <div class="info-value">{{ Auth::user()->created_at->format('d/m/Y') }}</div>
                    </div>
                </div>
            </div>

            <!-- Trạng thái tài khoản -->
            <div class="text-center mb-4">
                <span class="status-badge">
                    Tài khoản đang hoạt động
                </span>
            </div>

            <!-- Nút đăng xuất -->
            <div class="text-center mt-5">
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="btn btn-logout">
                    <i class="fas fa-sign-out-alt me-2"></i>
                    Đăng xuất
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

<!-- FontAwesome cho icons (thêm vào layouts.app nếu chưa có) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection