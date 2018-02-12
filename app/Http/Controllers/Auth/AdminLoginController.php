<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller {

    public function __construct() {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm() {
        return view('auth.admin-login');
    }

    public function login(Request $request) {
        $this->validate($request, [
            'login' => 'required',
            'password' => 'required|min:6',
        ]);

        if (Auth::guard('admin')->attempt(['login' => $request->login, 'password' => $request->password], $request->remember)) {
            return redirect()->intended(route('getAdminControlPanel'));
        }

        return redirect()->back()->withInput($request->only('login', 'remember'));
    }

    public function logout() {
        Auth::guard('admin')->logout();

        return redirect()->route( 'getAdminLogin' );
    }

    public function username() {
        return 'login';
    }
}
