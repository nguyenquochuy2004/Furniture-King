<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        return view('fe.login');
    }

    public function register()
    {
        return view('fe.register');
    }

    public function detail()
    {
        return view('fe.detail');
    }

    public function postregister(Request $req)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:16',
            'confirm_password' => 'required|same:password',
        ]);

        $data = request()->all('email', 'name');
        $data['password'] = bcrypt(request('password'));
        User::create($data);
        return redirect()->route('login');
    }

    public function postlogin(Request $req)
    {
        request()->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ]);

        $credentials = $req->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->route('index');
        }

        return redirect()->back()->withErrors([
            'error' => 'Thông tin không hợp lệ. Vui lòng thử lại.'
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }
}
