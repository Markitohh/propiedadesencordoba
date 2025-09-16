<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new \Illuminate\Notifications\Messages\MailMessage)
                ->subject('Verifica tu dirección de correo electrónico')
                ->line('Haz clic en el siguiente enlace para verificar tu dirección de correo electrónico.')
                ->action('Verificar correo electrónico', $url)
                ->line('Si no creaste una cuenta, no se requiere ninguna acción adicional.');
        });
    }
}
