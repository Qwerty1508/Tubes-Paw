@extends('layouts.guest')

@section('title', 'Masuk')

@section('content')
<section class="min-vh-100 d-flex align-items-center bg-cream py-5">
    <div class="container">
        <div class="row g-0 justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-xl overflow-hidden" style="border-radius: 1.5rem;">
                    <div class="row g-0">
                        <div class="col-lg-6 d-none d-lg-block">
                            <div class="h-100 position-relative" 
                                 style="background: linear-gradient(135deg, rgba(12, 42, 54, 0.95), rgba(12, 42, 54, 0.85)), 
                                        url('https://res.cloudinary.com/dh9ysyfit/image/fetch/w_800,h_1000,c_fill,f_auto,q_auto/https://images.unsplash.com/photo-1517248135467-4c7edcad34c4') center/cover;">
                                <div class="p-5 d-flex flex-column justify-content-center h-100 text-white">
                                    <h2 class="display-6 fw-bold text-white mb-4" data-i18n="welcome_back">
                                        {{ __('messages.welcome_back') }}
                                    </h2>
                                    <p class="lead opacity-75 mb-4" data-i18n="login_desc">
                                        {{ __('messages.login_desc') }}
                                    </p>
                                    <ul class="list-unstyled">
                                        <li class="d-flex align-items-center mb-3">
                                            <i class="bi bi-check-circle-fill fs-5 me-3" style="color: #C89B3A;"></i>
                                            <span data-i18n="login_benefit_1">{{ __('messages.login_benefit_1') }}</span>
                                        </li>
                                        <li class="d-flex align-items-center mb-3">
                                            <i class="bi bi-check-circle-fill fs-5 me-3" style="color: #C89B3A;"></i>
                                            <span data-i18n="login_benefit_2">{{ __('messages.login_benefit_2') }}</span>
                                        </li>
                                        <li class="d-flex align-items-center mb-3">
                                            <i class="bi bi-check-circle-fill fs-5 me-3" style="color: #C89B3A;"></i>
                                            <span data-i18n="login_benefit_3">{{ __('messages.login_benefit_3') }}</span>
                                        </li>
                                                                                <li class="d-flex align-items-center">
                                            <i class="bi bi-check-circle-fill fs-5 me-3" style="color: #C89B3A;"></i>
                                            <span data-i18n="login_benefit_4">{{ __('messages.login_benefit_4') }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center mb-5">
                                    <a href="{{ url('/') }}" class="text-decoration-none">
                                        <h3 class="font-heading text-burgundy mb-2">