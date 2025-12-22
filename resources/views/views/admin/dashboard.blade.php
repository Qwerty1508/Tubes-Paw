@extends('layouts.guest')

@section('title', __('messages.admin_dashboard'))

@section('content')
<section class="section bg-cream">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <div class="card bg-gradient-primary text-white p-4">
                    <h3 class="text-white mb-2">
                        <i class="bi bi-shield-check me-2"></i>
                        <span data-i18n="admin_dashboard">{{ __('messages.admin_dashboard') }}</span>
                    </h3>
                    <p class="opacity-75 mb-0">
                        {{ __('messages.admin_welcome_desc', ['name' => Auth::user()->name]) }}
                    </p>
                </div>
            </div>
        </div>
        
        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="card h-100 text-center p-4">
                    <i class="bi bi-people fs-1 text-primary mb-2"></i>
                    <h4 class="mb-1">{{ $totalUsers ?? 0 }}</h4>
                    <small class="text-muted" data-i18n="total_users">{{ __('messages.total_users') }}</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 text-center p-4">
                    <i class="bi bi-person-plus fs-1 text-success mb-2"></i>
                    <h4 class="mb-1">{{ $todayUsers ?? 0 }}</h4>
                    <small class="text-muted" data-i18n="today_registration">{{ __('messages.today_registration') }}</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 text-center p-4">
                    <i class="bi bi-calendar-check fs-1 text-info mb-2"></i>
                    <h4 class="mb-1">{{ $last30DaysUsers ?? 0 }}</h4>
                    <small class="text-muted" data-i18n="registrations_30_days">{{ __('messages.registrations_30_days') }}</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 text-center p-4">
                    <i class="bi bi-book fs-1 text-warning mb-2"></i>
                    <h4 class="mb-1">{{ $totalMenus ?? 0 }}</h4>
                    <small class="text-muted" data-i18n="total_menus">{{ __('messages.total_menus') }}</small>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="card h-100 p-4 border-start border-4 border-success">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted">Pendapatan Hari Ini</small>
                            <h4 class="mb-0 text-success">Rp {{ number_format($todayRevenue ?? 0, 0, ',', '.') }}</h4>
                        </div>
                        <i class="bi bi-cash-stack fs-1 text-success opacity-50"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 p-4 border-start border-4 border-info">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted">Pesanan Hari Ini</small>
                            <h4 class="mb-0 text-info">{{ $todayOrders ?? 0 }}</h4>
                        </div>
                        <i class="bi bi-cart-check fs-1 text-info opacity-50"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 p-4 border-start border-4 border-warning">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted">Reservasi Hari Ini</small>
                            <h4 class="mb-0 text-warning">{{ $todayReservations ?? 0 }}</h4>
                        </div>
                        <i class="bi bi-calendar-event fs-1 text-warning opacity-50"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 p-4 border-start border-4 border-danger">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted">Menu Tidak Tersedia</small>
                            <h4 class="mb-0 text-danger">{{ $unavailableMenus ?? 0 }}</h4>
                        </div>
                        <i class="bi bi-exclamation-triangle fs-1 text-danger opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-12">
                <div class="card p-4">
                    <h5 class="mb-4">Aktivitas Terbaru</h5>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Aktivitas</th>
                                    <th>Pengguna</th>
                                    <th>Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($recentActivities->isEmpty())
                                    <tr>
                                        <td colspan="3" class="text-center text-muted">Tidak ada aktivitas baru</td>
                                    </tr>
                                @else
                                    @foreach($recentActivities as $activity)
                                        <tr>
                                            <td>{{ $activity->description }}</td>
                                            <td>{{ $activity->user->name ?? 'Sistem' }}</td>
                                            <td>{{ $activity->created_at->diffForHumans() }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection