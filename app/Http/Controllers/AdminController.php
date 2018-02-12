<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function getControlPanel() {
        return view('admin.pages.controlPanel');
    }

    public function getUsersList() {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.pages.usersList', ['users' => $users]);
    }

    public function getAddUser() {
        return view('admin.pages.addUser');
    }

    public function postAddUser(Request $request) {
        $this->validate($request, [
            'login' => 'required|unique:users,login',
            'password' => 'required|min:6',
        ]);

        $user = new User();
        $user->login = $request->login;
        $user->password = \Hash::make($request->password);
        $user->save();

        return redirect()->route('getAdminUsersList');
    }

    public function getSettings() {
        return;
    }

    public function getUserEdit( $id ) {
        $user  = User::find( $id );

        return view('admin.pages.editUser', ['user' => $user]);
    }

    public function postUserEdit( Request $request ) {
        $this->validate($request, [
            'login' => 'required'
        ]);

        $attributes = [
            'login' => $request->login,
        ];
        if (!is_null($request->password)) {
            array_push($attributes, [
                'password' => \Hash::make($request->password),
            ]);
        }

        $user  = User::find( $request->id );

        $user->update($attributes);

        return redirect()->route( 'getAdminUsersList' );
    }

    public function getUserDelete( $id ) {
        User::find( $id )->delete();

        return redirect()->route( 'getAdminUsersList' );
    }
}
