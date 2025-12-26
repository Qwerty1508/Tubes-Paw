@extends('layouts.admin')
@section('title', __('messages.manage_menus'))
@section('content')
<section class="section bg-cream">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-1">{{ __('messages.manage_menus') }}</h3>
                        <p class="text-muted mb-0">{{ __('messages.manage_menus_desc') }}</p>
                    </div>
                    <a href="/admin/menus/create" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-2"></i>{{ __('messages.add_menu') }}
                    </a>
                </div>
            </div>
        </div>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>{{ __('messages.menu_image') }}</th>
                                <th>{{ __('messages.menu_name') }}</th>
                                <th>{{ __('messages.menu_category') }}</th>
                                <th>{{ __('messages.menu_price') }}</th>
                                <th>{{ __('messages.menu_status') }}</th>
                                <th class="text-end">{{ __('messages.menu_action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($menus->count() > 0)
                                @foreach($menus as $menu)
                                    <tr>
                                        <td>
                                            @if($menu->image_url)
                                                <img src="{{ asset('storage/' . $menu->image_url) }}" alt="{{ $menu->name }}" class="img-thumbnail" width="50">
                                            @else
                                                <i class="bi bi-image text-muted fs-4"></i>
                                            @endif
                                        </td>
                                        <td>{{ $menu->name }}</td>
                                        <td>{{ $menu->category }}</td>
                                        <td>Rp {{ number_format($menu->price, 0, ',', '.') }}</td>
                                        <td>
                                            @if($menu->is_available)
                                                <span class="badge bg-success">Tersedia</span>
                                            @else
                                                <span class="badge bg-danger">Tidak Tersedia</span>
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            <a href="/admin/menus/{{ $menu->id }}/edit" class="btn btn-sm btn-warning me-1">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="/admin/menus/{{ $menu->id }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus menu ini?')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">
                                        <i class="bi bi-inbox fs-1"></i>
                                        <p class="mb-0">{{ __('messages.no_menus') }}</p>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                @if($menus->count() > 0)
                    <div class="card-footer bg-white">
                        {{ $menus->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection