<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected string $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validateLogin(Request $request): void
    {
        $messages = [
            $this->username() . '.required' => 'Email harus diisi.',
            $this->username() . '.email' => 'Format email tidak valid.',
            $this->username() . '.string' => 'Email harus berupa teks.',
            'password.required' => 'Password harus diisi.',
            'password.string' => 'Password harus berupa teks.',
            'password.min' => 'Password harus memiliki minimal :min karakter.',
        ];

        $request->validate([
            $this->username() => 'required|email:rfc,dns|string',
            'password' => 'required|string|min:8',
        ], $messages);
    }

    protected function authenticated(Request $request, $user): RedirectResponse
    {
        return redirect()->intended($this->redirectPath())
            ->with('login_success', 'Selamat datang! Anda berhasil login.');
    }


    public function logout(Request $request): \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
    {
        Auth::logout();
        return redirect('/login');
    }
}
