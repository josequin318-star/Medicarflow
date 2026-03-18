<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
Use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
{
    $user = DB::table('usuarios')
        ->where('username', $request->username)
        ->first();

    if ($user && Hash::check($request->password, $user->password)) {

        session([
            'user_id' => $user->id_user,
            'username' => $user->username
        ]);

        return redirect('/dashboard');
    }

    return back()->with('error', 'Credenciales incorrectas');
}

    public function logout()
    {
        Session::flush();
        return redirect('/login');
    }
}