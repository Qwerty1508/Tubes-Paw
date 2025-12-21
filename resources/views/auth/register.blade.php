@extends('layouts.guest')

@section('title', 'Daftar')

@section('content')
<section class="min-vh-100 d-flex align-items-center bg-cream py-5">
    <div class="container">
        <div class="row g-0 justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-xl overflow-hidden" style="border-radius: 1.5rem;">
                    <div class="row g-0">
                        <div class="col-lg-6 order-lg-1 order-2">
                            <div class="p-5">
                                <div class="text-center mb-4">
                                    <a href="{{ url('/') }}" class="text-decoration-none">
                                        <h3 class="font-heading text-burgundy mb-2">
                                            Culinaire<span class="text-gold">.</span>
                                        </h3>
                                    </a>
                                    <p class="text-muted" data-i18n="create_account">{{ __('messages.create_account') }}</p>
                                </div>