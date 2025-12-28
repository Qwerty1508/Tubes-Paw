// ReservationController.php
public function index()
{
    $reservations = Reservation::latest()->paginate(15);
    
    return view('admin.reservations.index', [
        'reservations' => $reservations,
        'pendingCount' => Reservation::where('status', 'pending')->count(),
        'acceptedCount' => Reservation::where('status', 'accepted')->count(),
        'rejectedCount' => Reservation::where('status', 'rejected')->count(),
        'todayCount' => Reservation::whereDate('date', today())->count(),
    ]);
}