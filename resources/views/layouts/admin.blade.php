<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin - Culinaire</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 260px;
            background: #ffffff;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            z-index: 1040;
            transform: translateX(0);
            transition: transform 0.3s ease;
        }
        .sidebar.collapsed {
            transform: translateX(-100%);
        }
        .main-content-admin {
            margin-left: 260px;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.4);
            z-index: 1030;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        .sidebar-overlay.show {
            opacity: 1;
            visibility: visible;
        }
        @media (max-width: 991.98px) {
            .main-content-admin {
                margin-left: 0;
            }
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.show {
                transform: translateX(0);
            }
        }

        @keyframes fade-in {
            from { opacity: 0; transform: scale(1.02); }
            to { opacity: 1; transform: scale(1); }
        }
    </style>
    
    @stack('styles')
</head>
<body>
    @include('components.sidebar')
    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    <div class="main-content-admin">
        <nav class="navbar navbar-expand-lg bg-white shadow-sm rounded-3 mb-4 px-4" style="overflow: visible;">
            <div class="container-fluid">
                <button class="btn btn-link d-lg-none p-0 me-3" id="sidebarToggle">
                    <i class="bi bi-list fs-4"></i>
                </button>
                <div class="d-none d-md-flex flex-grow-1" style="max-width: 400px;">
                    <div class="input-group">
                        <span class="input-group-text bg-light border-0">
                            <i class="bi bi-search text-muted"></i>
                        </span>
                        <input type="text" class="form-control bg-light border-0" placeholder="Cari...">
                    </div>
                </div>
                <div class="d-flex align-items-center gap-3 ms-auto">
                    <button class="theme-toggle" id="themeToggle">
                        <i class="bi bi-moon-fill icon-moon"></i>
                        <i class="bi bi-sun-fill icon-sun"></i>
                    </button>
                    <div class="dropdown">
                        <button class="btn btn-link p-0 position-relative" data-bs-toggle="dropdown">
                            <i class="bi bi-bell fs-5 text-muted"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                3
                            </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end shadow" style="width: 320px;">
                            <h6 class="dropdown-header">Notifikasi</h6>
                            <a class="dropdown-item py-3" href="#">
                                <div class="d-flex">
                                    <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                        <i class="bi bi-calendar-check text-primary"></i>
                                    </div>
                                    <div>
                                        <p class="mb-0 small">Reservasi baru dari <strong>John Doe</strong></p>
                                        <small class="text-muted">5 menit yang lalu</small>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item py-3" href="#">
                                <div class="d-flex">
                                    <div class="bg-success bg-opacity-10 rounded-circle p-2 me-3">
                                        <i class="bi bi-cash-stack text-success"></i>
                                    </div>
                                    <div>
                                        <p class="mb-0 small">Pembayaran diterima <strong>#ORD-2024</strong></p>
                                        <small class="text-muted">15 menit yang lalu</small>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item py-3" href="#">
                                <div class="d-flex">
                                    <div class="bg-warning bg-opacity-10 rounded-circle p-2 me-3">
                                        <i class="bi bi-exclamation-triangle text-warning"></i>
                                    </div>
                                    <div>
                                        <p class="mb-0 small">Stok <strong>Rendang</strong> hampir habis</p>
                                        <small class="text-muted">1 jam yang lalu</small>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-center text-primary small" href="#">
                                Lihat semua notifikasi
                            </a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-link p-0 d-flex align-items-center gap-2 text-decoration-none" data-bs-toggle="dropdown" data-bs-boundary="viewport" aria-expanded="false">
                            <img src="https://i.pravatar.cc/40?img=12" alt="Admin" class="rounded-circle" 
                                 style="width: 40px; height: 40px; object-fit: cover;">
                            <div class="d-none d-md-block text-start">
                                <strong class="d-block text-dark small">{{ Auth::user()->name ?? 'Admin' }}</strong>
                                <small class="text-muted">Administrator</small>
                            </div>
                            <i class="bi bi-chevron-down text-muted small"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i> Profil</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i> Pengaturan</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i> Keluar
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle sidebar
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        
        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', () => {
                document.querySelector('.sidebar').classList.toggle('show');
                sidebarOverlay.classList.toggle('show');
            });
        }
        if (sidebarOverlay) {
            sidebarOverlay.addEventListener('click', () => {
                document.querySelector('.sidebar').classList.remove('show');
                sidebarOverlay.classList.remove('show');
            });
        }

        // Toggle tema
        const themeToggle = document.getElementById('themeToggle');
        if (themeToggle) {
            const savedTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-bs-theme', savedTheme);
            themeToggle.querySelector('.icon-sun').style.display = savedTheme === 'dark' ? 'none' : 'inline';
            themeToggle.querySelector('.icon-moon').style.display = savedTheme === 'dark' ? 'inline' : 'none';

            themeToggle.addEventListener('click', () => {
                const newTheme = savedTheme === 'light' ? 'dark' : 'light';
                localStorage.setItem('theme', newTheme);
                document.documentElement.setAttribute('data-bs-theme', newTheme);
                themeToggle.querySelector('.icon-sun').style.display = newTheme === 'dark' ? 'none' : 'inline';
                themeToggle.querySelector('.icon-moon').style.display = newTheme === 'dark' ? 'inline' : 'none';
            });
        }
    </script>
    
    @stack('scripts')
</body>
</html>