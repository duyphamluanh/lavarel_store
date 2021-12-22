<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('admin.home', [
            'title' => 'Admin page'
        ]);
    }
    //
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/users/login');
    }
}
