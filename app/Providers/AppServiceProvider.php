<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Mail;
use App\Mail\YourMailable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class AppServiceProvider extends ServiceProvider 
{
    /**
     * Register any application services.
     */
    public const HOME = '/home';
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject('Verifikasi Email Anda')
                ->greeting('Hai ' . $notifiable->name . ' 👋')
                ->line('Selamat 🥳. Akunmu berhasil dibuat di Pinjemin.')
                ->action('Klik untuk Verifikasi Email Address mu', $url)
                ->line('Jika Anda tidak merasa mendaftar, abaikan email ini.');
        });
    }
}
