<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            $allowedDomains = [
                'gmail.com',
                'outlook.com',
                'hotmail.com',
                'yahoo.com',
                'icloud.com',
                'proton.me',
                'protonmail.com',
                'yandex.com',
            ];
            
            $email = $googleUser->getEmail();
            $emailDomain = substr(strrchr($email, "@"), 1);
            
            if (!in_array(strtolower($emailDomain), $allowedDomains)) {
                return redirect()->route('login')->with('error', 'Maaf, hanya email dengan domain ' . implode(', ', $allowedDomains) . ' yang diizinkan untuk mendaftar.');
            }
            
            $user = User::where('google_id', $googleUser->getId())->first();
            
            if (!$user) {
                $user = User::where('email', $googleUser->getEmail())->first();
                
                if ($user) {
                    $user->update([
                        'google_id' => $googleUser->getId(),
                    ]);
                } else {
                $user = User::where('email', $googleUser->getEmail())->first();
                
                if ($user) {
                    $user->update([
                        'google_id' => $googleUser->getId(),
                    ]);
                } else {