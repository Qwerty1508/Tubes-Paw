// UserController.php
public function index(Request $request)
{
    $query = User::query();
    $filter = $request->get('filter', 'all');

    switch ($filter) {
        case 'today':
            $query->whereDate('created_at', today());
            break;
        case '30days':
            $query->where('created_at', '>=', now()->subDays(30));
            break;
    }

    $users = $query->latest()->paginate(15);
    
    return view('admin.users.index', [
        'users' => $users,
        'totalCount' => User::count(),
        'todayCount' => User::whereDate('created_at', today())->count(),
        'last30DaysCount' => User::where('created_at', '>=', now()->subDays(30))->count()
    ]);
}