<!-- resources/views/components/sidebar.blade.php -->
<div class="sidebar">
    <div class="sidebar-header p-4">
        <h5 class="text-primary mb-0">Culinaire Admin</h5>
    </div>
    <ul class="sidebar-menu list-unstyled">
        <li><a href="/admin/dashboard" class="d-flex align-items-center text-decoration-none py-3 px-4 {{ request()->is('admin/dashboard') ? 'bg-primary text-white' : '' }}">
            <i class="bi bi-house me-2"></i> Dashboard
        </a></li>
        <li><a href="/admin/menus" class="d-flex align-items-center text-decoration-none py-3 px-4 {{ request()->is('admin/menus') ? 'bg-primary text-white' : '' }}">
            <i class="bi bi-book me-2"></i> Menu
        </a></li>
        <li><a href="/admin/orders" class="d-flex align-items-center text-decoration-none py-3 px-4 {{ request()->is('admin/orders') ? 'bg-primary text-white' : '' }}">
            <i class="bi bi-bag me-2"></i> Pesanan
        </a></li>
        <li><a href="/admin/reservations" class="d-flex align-items-center text-decoration-none py-3 px-4 {{ request()->is('admin/reservations') ? 'bg-primary text-white' : '' }}">
            <i class="bi bi-calendar-check me-2"></i> Reservasi
        </a></li>
        <li><a href="/admin/users" class="d-flex align-items-center text-decoration-none py-3 px-4 {{ request()->is('admin/users') ? 'bg-primary text-white' : '' }}">
            <i class="bi bi-people me-2"></i> Pengguna
        </a></li>
        <li><a href="/admin/activity-logs" class="d-flex align-items-center text-decoration-none py-3 px-4 {{ request()->is('admin/activity-logs') ? 'bg-primary text-white' : '' }}">
            <i class="bi bi-clock-history me-2"></i> Aktivitas
        </a></li>
    </ul>
</div>