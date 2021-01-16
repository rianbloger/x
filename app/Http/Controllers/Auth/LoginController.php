<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login()
    {
        $attr = request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::whereEmail(request('email'))->first();
        if ($user) {
            if (Auth::attempt($attr)) {
                return redirect()->intended('/');
            }
        } else {
            return back()->with('error', 'Kami tidak dapat menemukan kredensial yang anda masukan');
        }
    }
}
