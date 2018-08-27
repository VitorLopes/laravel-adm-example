<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login.index');
    }

    public function authenticate(LoginRequest $request)
    {
        $email = $request->email;
        $password = $request->password;
        $remember = $request->remember ? 1: 0;
        if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
            return redirect()->intended('admin');
        }
        return redirect('/admin/login')
                ->with('status', 'Usuário inválido');
    }
}
