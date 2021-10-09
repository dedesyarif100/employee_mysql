<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class LoginController extends Controller
{
    public function Login(Request $request)
    {
        $login = [
            'superadmin' => '12345',
            'admin' => '12345',
            'user' => '12345',
        ];

        if (in_array($request->username, array_keys($login))) {
            if ($request->password === $login[$request->username] && $request->username === 'superadmin') {
                session()->put('login', Crypt::encrypt($request->username));
                // dd(Crypt::encrypt($request->username));
                return redirect('home');
            }
            if ($request->password === $login[$request->username] && $request->username === 'admin') {
                session()->put('login', Crypt::encrypt($request->username));
                // dd(Crypt::encrypt($request->username));
                return redirect('project/webdevelopment');
            }
            if ($request->password === $login[$request->username] && $request->username === 'user') {
                session()->put('login', Crypt::encrypt($request->username));
                // dd(Crypt::encrypt($request->username));
                return redirect('division/humanresource');
            }
        }

        return redirect('employee/login');
    }

    public function Logout()
    {
        session()->flush();
        return redirect('employee/login');
    }
}
