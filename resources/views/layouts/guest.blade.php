<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ __('messages.meta_desc') }}">
    <meta name="keywords" content="restaurant, culinary, Indonesian food, fine dining, reservasi, kuliner">
    
    <title>@yield('title', 'Culinaire') - {{ config('app.name', __('messages.premium_restaurant')) }}</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">