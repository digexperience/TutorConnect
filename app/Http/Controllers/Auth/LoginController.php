<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->hasRole('2')) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->hasRole('1')) {
            return redirect('/tutor/dashboard');
        } elseif ($user->hasRole('0')) {
            return redirect('/home');
        }

        return redirect($this->redirectTo);
    }
}
