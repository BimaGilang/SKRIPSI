<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('layout.user')->with([
            'user' => Auth::user()
        ]);
    }

    public function data()
    {
        // $user = User::isNotAdmin()->orderBy('id', 'ASC')->get();
        $user = User::orderBy('id', 'ASC')->get();

        return datatables()
            ->of($user)
            ->addIndexColumn()
            ->addColumn('aksi', function ($user) {
                return '
                <div class="btn-group">
                    <button type="button" onclick="editForm(`' . route('user.update', $user->id) . '`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-edit"></i></button>
                    <button type="button" onclick="deleteData(`' . route('user.destroy', $user->id) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->level = $request->level;
        $user->save();

        return response()->json('Data berhasil disimpan', 200);
    }

    public function show($id)
    {
        $user = User::find($id);

        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        if ($request->has('password') && $request->password != "") {
            $user->password = bcrypt($request->password);
        }
        $user->update();

        return response()->json('Data berhasil disimpan', 200);
    }

    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return response(null, 204);
    }
}
