<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ErrorHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function showLoginForm(): View
    {
        return view('admin.login');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        $credentials = [
            'email' => $request->validated('email'),
            'password' => $request->validated('password')
        ];

        if (auth()->attempt($credentials, $request->validated('remember_me'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'));
        }

        ErrorHelper::error('login.errors.not_authenticated');

        return redirect()->back()->withInput($request->validated());
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->redirectToRoute('admin.login');
    }
}
