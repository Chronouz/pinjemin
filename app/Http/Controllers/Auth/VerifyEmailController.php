<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            // Logout pengguna jika email sudah diverifikasi
            Auth::logout();

            // Redirect ke halaman login dengan pesan sukses
            return redirect()->route('login')->with([
                'status' => 'Email Anda telah diverifikasi. Silakan login ulang.',
                'showLogin' => true,
            ]);
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        // Logout pengguna setelah verifikasi
        Auth::logout();

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')->with([
            'status' => 'Email Anda telah diverifikasi. Silakan login ulang.',
            'showLogin' => true,
        ]);
    }
}
