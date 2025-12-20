<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'email' => 'Email atau password salah.',
            ])->withInput($request->only('email'));
        }

        if ($user->isBlocked()) {
            return back()->withErrors([
                'email' => 'Akun Anda telah diblokir. Silakan hubungi admin untuk informasi lebih lanjut.',
            ])->withInput($request->only('email'));
        }

        Auth::login($user, $request->boolean('remember'));

        \DB::table('activity_logs')->insert([
            'user_id' => $user->id,
            'action' => 'login',
            'description' => 'User logged in',
            'ip_address' => $request->ip(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($user->is_admin) {
            return redirect('/admin/dashboard');
        }

        if ($user->isSuspended()) {