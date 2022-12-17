<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function showDashboard()
    {
        $userName = Auth::guard('admin')->user();
        return view('dashboard',['userName' => $userName]);
    }
}
