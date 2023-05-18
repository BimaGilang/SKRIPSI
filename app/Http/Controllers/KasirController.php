<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class KasirController extends Controller
{
    public function index()
    {
        return view('layout.kasir')->with([
            'user' => Auth::user()
        ]);
    }
    public function data()
    {
        $kasir = User::where('level', '2')->orderBy('id', 'ASC')->get();
        // $kasir = User::orderBy('id', 'ASC')->get();

        return datatables()
            ->of($kasir)
            ->addIndexColumn()
            ->addColumn('aksi', function ($kasir) {
                return '
                <div class="btn-group">
                    <button type="button" onclick="editForm(`' . route('kasir.update', $kasir->id) . '`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-edit"></i></button>
                    <button type="button" onclick="deleteData(`' . route('kasir.destroy', $kasir->id) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kasir = new User();
        $kasir->name = $request->name;
        $kasir->email = $request->email;
        $kasir->username = $request->username;
        $kasir->password = bcrypt($request->password);
        $kasir->level = 2;
        $kasir->save();

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kasir = User::find($id);

        return response()->json($kasir);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kasir = User::find($id);
        $kasir->name = $request->name;
        $kasir->email = $request->email;
        $kasir->username = $request->username;
        if ($request->has('password') && $request->password != "") {
            $kasir->password = bcrypt($request->password);
        }
        $kasir->update();

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kasir = User::find($id)->delete();

        return response(null, 204);
    }

    public function profil()
    {
        $profil = auth()->user();
        return view('layout.userProfil', compact('profil'))->with([
            'user' => Auth::user()
        ]);
    }

    public function updateProfil(Request $request)
    {
        $user = auth()->user();

        $user->name = $request->name;
        $user->username = $request->username;
        if ($request->has('password') && $request->password != "") {
            if (Hash::check($request->old_password, $user->password)) {
                if ($request->password == $request->password_confirmation) {
                    $user->password = bcrypt($request->password);
                } else {
                    return response()->json('Konfirmasi password tidak sesuai', 422);
                }
            } else {
                return response()->json('Password lama tidak sesuai', 422);
            }
        }
        $user->update();
        return response()->json($user, 200);
    }
}
