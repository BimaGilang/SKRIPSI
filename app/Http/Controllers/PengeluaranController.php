<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengeluaranController extends Controller
{
    public function index()
    {
        return view('layout.pengeluaran')->with([
            'user' => Auth::user()
        ]);
    }
}
