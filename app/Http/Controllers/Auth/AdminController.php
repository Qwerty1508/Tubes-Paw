<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $todayUsers = User::whereDate('created_at', today())->count();
        $last30DaysUsers = User::where('created_at', '>=', now()->subDays(30))->count();
        $totalMenus = Menu::count();
        $todayRevenue = Order::whereDate('created_at', today())->sum('total');
        $todayOrders = Order::whereDate('created_at', today())->count();
        $todayReservations = Reservation::whereDate('created_at', today())->count();
        $unavailableMenus = Menu::where('is_available', false)->count();

        $recentActivities = ActivityLog::with('user')->latest()->take(10)->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'todayUsers',
            'last30DaysUsers',
            'totalMenus',
            'todayRevenue',
            'todayOrders',
            'todayReservations',
            'unavailableMenus',
            'recentActivities'
        ));
    }
}