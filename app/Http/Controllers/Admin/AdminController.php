<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function logon()
    {
        return view('admin.logon');
    }

    public function postlogon(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            if ($user->role == 1) {
                return redirect()->route('category.index');
            } else {
                Auth::logout(); 
                return redirect()->back()->with('error', 'Bạn không có quyền đăng nhập');
            }
        }
        return redirect()->back()->with('error', 'Sai thông tin đăng nhập');
    }

    public function signOut (){
        Auth::logout();
        return redirect()->route('logon');
    }  
}
