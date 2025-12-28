use App\Http\Controllers\AdminController;
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::put('/admin/menus/{menu:slug}', [MenuController::class, 'update'])->name('admin.menus.update');
});