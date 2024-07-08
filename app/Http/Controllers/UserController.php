<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::orderBy('id', 'ASC')->get();
        $users = User::orderBy('id', 'ASC')->get();
        return view('master.akun', compact('karyawan','users'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $users = User::create($request->all());
        return redirect('/akun')->with('status', 'Data Berhasil Disimpan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $users = User::find($id);
        $users->update($request->all());
        return redirect('/akun')->with('status', 'Data Berhasil Di Ubah');
    }

    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect('/akun')->with('status', 'Data Berhasil Dihapus');
    }
}
