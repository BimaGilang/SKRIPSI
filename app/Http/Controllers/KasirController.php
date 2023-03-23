<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KasirController extends Controller
{
    public function index()
    {
        return view('layout.kasir')->with([
            'user' => Auth::user()
        ]);
    }
}
