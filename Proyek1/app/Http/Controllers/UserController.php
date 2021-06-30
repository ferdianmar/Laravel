<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index', ['users' => User::all()]);
    }

    public function edit($id)
    {
        $users = User::find($id);
        return view('users.edit', compact('users'));
    }
    public function update(Request $request, $id)
    {

        // return $request;
        User::find($id)
            ->update($request->all());
        return redirect('/user')->with('pesan', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect('/user')->with('pesan', 'Data berhasil dihapus');
    }
}
