<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembelianController extends Controller
{
    public function index()
    {
        return view('layout.pembelian')->with([
            'user' => Auth::user()
        ]);
    }
}
