<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    public function index()
    {
        return view('layout.produk')->with([
            'user' => Auth::user()
        ]);
    }
}
