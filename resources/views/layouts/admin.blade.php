                            <a class="dropdown-item py-3" href="#">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <i class="bi bi-cart-check text-success fs-5"></i>
                                    </div>
                                    <div class="ms-3">
                                        <p class="mb-1 fw-medium">Pesanan #ORD-00123 berhasil</p>
                                        <small class="text-muted">2 menit yang lalu</small>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item py-3" href="#">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <i class="bi bi-person-plus text-primary fs-5"></i>
                                    </div>
                                    <div class="ms-3">
                                        <p class="mb-1 fw-medium">Pengguna baru mendaftar</p>
                                        <small class="text-muted">1 jam yang lalu</small>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item py-3" href="#">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <i class="bi bi-calendar-check text-warning fs-5"></i>
                                    </div>
                                    <div class="ms-3">
                                        <p class="mb-1 fw-medium">Reservasi untuk 4 orang</p>
                                        <small class="text-muted">Hari ini, pukul 19.00</small>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-center text-primary fw-medium" href="#">Lihat Semua</a>
                        </div>
                    </div>

                    <div class="dropdown">
                        <a class="dropdown-toggle d-flex align-items-center text-decoration-none" href="#" role="button" data-bs-toggle="dropdown">
                            <img src="https://ui-avatars.com/api/?name=Admin&background=1e3a8a&color=fff" class="rounded-circle" width="36" height="36" alt="Admin">
                            <span class="ms-2 d-none d-md-inline text-dark">Admin</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i> Profil</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i> Pengaturan</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger"><i class="bi bi-box-arrow-right me-2"></i> Keluar</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <main class="container-fluid">
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle sidebar
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.body.classList.toggle('sidebar-open');
        });
        document.getElementById('sidebarOverlay').addEventListener('click', function() {
            document.body.classList.remove('sidebar-open');
        });

        // Toggle tema (terang/gelap)
        const themeToggle = document.getElementById('themeToggle');
        if (themeToggle) {
            const currentTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-bs-theme', currentTheme);
            themeToggle.querySelector('.icon-sun').style.display = currentTheme === 'dark' ? 'none' : 'inline';
            themeToggle.querySelector('.icon-moon').style.display = currentTheme === 'dark' ? 'inline' : 'none';

            themeToggle.addEventListener('click', () => {
                const newTheme = currentTheme === 'light' ? 'dark' : 'light';
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