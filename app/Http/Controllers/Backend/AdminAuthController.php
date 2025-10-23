<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function adminLoginForm()
    {
        return view('backend.login');
    }
    public function adminLogoutForm()
    {
        Auth::logout();
        return redirect('/admin/login');
    }
}
