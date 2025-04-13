<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    function showlogin(){
        return view('login');
    }

    function submitlogin(Request $request) {
        $data =  $request->only('email', 'password');
        // $user->username = $request->username;
        // $user->password = bcrypt($request->password);
        // $user->save();
        // // dd($user);
        // // return redirect()->route('katalogBarang');

        if (Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect()->route('user.tampil'); //user belum ada
        } else{
            return redirect()->back()->with('gagal', 'Email atau password anda salah');
        }
    }
}
