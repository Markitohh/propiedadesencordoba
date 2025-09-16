<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    // public function __invoke(EmailVerificationRequest $request): RedirectResponse
    // {
    //     if ($request->user()->hasVerifiedEmail()) {
    //         return redirect()->intended(route('propiedades.index', absolute: false).'?verified=1');
    //     }

    //     if ($request->user()->markEmailAsVerified()) {
    //         event(new Verified($request->user()));
    //     }

    //     return redirect()->intended(route('propiedades.index', absolute: false).'?verified=1');
    // }
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended($this->redirectByRol($request->user()) . '?verified=1');
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return redirect()->intended($this->redirectByRol($request->user()) . '?verified=1');
    }

    private function redirectByRol($user)
    {
        return $user->rol == 2
            ? route('propiedades.index')
            : route('home'); 
    }

}
