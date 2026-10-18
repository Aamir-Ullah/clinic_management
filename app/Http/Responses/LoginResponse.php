<?php
namespace App\Http\Responses;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = $request->user();

        if ($user->hasRole('Admin')) {
            return redirect()->intended(route('admin.dashboard'));
        }

        if ($user->hasRole('Doctor')) {
            return redirect()->intended(route('doctor.dashboard'));
        }

        if ($user->hasRole('Patient')) {
            return redirect()->intended(route('patient.dashboard'));
        }

        return redirect()->intended('/');
    }
}
