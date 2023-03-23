<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
    public function index()
    {
        return view('layout.kategori')->with([
            'user' => Auth::user()
        ]);
    }
}
