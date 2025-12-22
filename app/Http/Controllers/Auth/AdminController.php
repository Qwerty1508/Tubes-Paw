<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        // Statistik Pengguna
        $totalUsers = User::count();
        $todayUsers = User::whereDate('created_at', today())->count();
        $last30DaysUsers = User::where('created_at', '>=', now()->subDays(30))->count();

        // Statistik Menu
        $totalMenus = Menu::count();
        $unavailableMenus = Menu::where('is_available', false)->count();

        // Statistik Pesanan Hari Ini
        $todayOrders = Order::whereDate('created_at', today())->count();
        $todayRevenue = Order::whereDate('created_at', today())->sum('total');

        // Statistik Reservasi Hari Ini
        $todayReservations = Reservation::whereDate('created_at', today())->count();

        // Statistik Tambahan (Langkah 256+)
        $monthRevenue = Order::whereBetween('created_at', [
            now()->startOfMonth(),
            now()->endOfMonth()
        ])->sum('total');

        $pendingOrders = Order::where('status', 'pending')->count();
        $totalOrders = Order::count();

        // Data Terbaru
        $recentActivities = ActivityLog::with('user')->latest()->take(10)->get();
        $recentOrders = Order::with('user')->latest()->take(5)->get();
        $recentReservations = Reservation::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'todayUsers',
            'last30DaysUsers',
            'totalMenus',
            'unavailableMenus',
            'todayOrders',
            'todayRevenue',
            'todayReservations',
            'monthRevenue',
            'pendingOrders',
            'totalOrders',
            'recentActivities',
            'recentOrders',
            'recentReservations'
        ));
    }
}