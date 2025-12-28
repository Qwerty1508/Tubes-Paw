@extends('layouts.admin')
@section('title', 'Manajemen Reservasi')
@section('content')
<section class="section bg-cream">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <h3 class="mb-1">Manajemen Reservasi</h3>
                <p class="text-muted mb-0">Kelola permintaan reservasi dari pelanggan</p>
            </div>
        </div>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card bg-warning bg-opacity-10 border-warning">
                    <div class="card-body text-center">
                        <h3 class="mb-0 text-warning">{{ $pendingCount }}</h3>
                        <small class="text-muted">Pending</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success bg-opacity-10 border-success">
                    <div class="card-body text-center">
                        <h3 class="mb-0 text-success">{{ $acceptedCount }}</h3>
                        <small class="text-muted">Diterima</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-danger bg-opacity-10 border-danger">
                    <div class="card-body text-center">
                        <h3 class="mb-0 text-danger">{{ $rejectedCount }}</h3>
                        <small class="text-muted">Ditolak</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-primary bg-opacity-10 border-primary">
                    <div class="card-body text-center">
                        <h3 class="mb-0 text-primary">{{ $todayCount }}</h3>
                        <small class="text-muted">Hari Ini</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Tanggal & Waktu</th>
                                <th>Tamu</th>
                                <th>Status</th>
                                <th class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($reservations as $reservation)
                                <tr>
                                    <td><strong>{{ $reservation->name }}</strong></td>
                                    <td>{{ $reservation->email }}</td>
                                    <td>{{ $reservation->phone }}</td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($reservation->date)->format('d M Y') }}<br>
                                        <small class="text-muted">{{ $reservation->time }}</small>
                                    </td>
                                    <td>{{ $reservation->guests }} orang</td>
                                    <td>
                                        @if($reservation->status === 'accepted')
                                            <span class="badge bg-success">Diterima</span>
                                        @elseif($reservation->status === 'rejected')
                                            <span class="badge bg-danger">Ditolak</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                Tindakan
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <form action="{{ route('admin.reservations.update', $reservation->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="status" value="accepted">
                                                        <button type="submit" class="dropdown-item text-success" {{ $reservation->status === 'accepted' ? 'disabled' : '' }}>
                                                            <i class="bi bi-check-circle me-2"></i>Terima
                                                        </button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form action="{{ route('admin.reservations.update', $reservation->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="status" value="rejected">
                                                        <button type="submit" class="dropdown-item text-danger" {{ $reservation->status === 'rejected' ? 'disabled' : '' }}>
                                                            <i class="bi bi-x-circle me-2"></i>Tolak
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-5">
                                        <i class="bi bi-inbox fs-1 text-muted"></i>
                                        <p class="text-muted mb-0">Tidak ada reservasi ditemukan</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($reservations->hasPages())
                    <div class="card-footer bg-white d-flex justify-content-end">
                        {{ $reservations->links() }}
                    </div>
                @endif
            </div>
        </div>
        <div class="mt-4">
            <a href="/admin/dashboard" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i>Kembali ke Dashboard
            </a>
        </div>
    </div>
</section>
@endsection