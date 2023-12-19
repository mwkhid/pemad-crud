<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // return view('home');

        $roles = Auth::User()->roles;
        if ($roles == 'ADMIN') {
            return view('admin.dashboard');
        }
        if ($roles == 'CLIENT') {
            return view('home');
        }
    }
}
