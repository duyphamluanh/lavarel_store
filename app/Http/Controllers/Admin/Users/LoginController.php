<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index(){
        return view('admin.users.login',[
            'title' => "Đăng nhập hệ thống"
        ]);
    }

    public function store(Request $request){
        // dd($request->input());
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        $email = $request->input('email');
        $password = $request->input('password');
        $renember = $request->input('renember');

        if ($user = Auth::attempt(['email' => $email, 'password' => $password], $renember)) {
            return redirect()->route('admin');
        }
        return redirect()->back()->withInput();
    }
}
