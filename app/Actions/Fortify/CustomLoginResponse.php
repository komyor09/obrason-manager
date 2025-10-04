<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse;

class CustomLoginResponse implements LoginResponse
{
    /**
     * Handle the response after login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function toResponse($request)
    {
        $user = Auth::user();

        if ($user->role?->name === 'admin') {
            return redirect('/admin/dashboard');
        } elseif ($user->role?->name === 'company_owner') {
            return redirect('/company_owner/dashboard');
        }

        return redirect('/dashboard');
    }
}
