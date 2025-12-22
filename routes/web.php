Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware('auth');