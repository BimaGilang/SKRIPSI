<?php

namespace App\Http\Controllers;

use App\Models\Rop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RopController extends Controller
{
    public function index()
    {
        return view('layout.rop')->with([
            'user' => Auth::user()
        ]);
    }
    public function show()
    {
        return Rop::first();
    }
    public function update(Request $request)
    {
        $rop = Rop::first();
        $rop->total_penjualan = $request->total_penjualan;
        $rop->total_hari_penjualan = $request->total_hari_penjualan;
        $rop->demand = $request->demand;
        $rop->lead_time = $request->lead_time;
        $rop->safety_stock = $request->safety_stock;
        $rop->reorder_point = $request->reorder_point;

        $rop->update();

        return response()->json('Data berhasil disimpan', 200);
    }
}
