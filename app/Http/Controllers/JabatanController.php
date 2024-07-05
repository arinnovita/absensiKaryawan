<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatan = Jabatan::orderBy('id', 'ASC')->get();
        return view('master.jabatan', compact('jabatan'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $jabatan = Jabatan::create($request->all());
        return redirect('/jabatan')->with('status', 'Data Berhasil Disimpan');
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
        $jabatan = Jabatan::find($id);
        $jabatan->update($request->all());
        return redirect('/jabatan')->with('status', 'Data Berhasil Di Ubah');
    }

    public function destroy($id)
    {
        $jabatan = Jabatan::find($id);
        $jabatan->delete();
        return redirect('/jabatan')->with('status', 'Data Berhasil Dihapus');
    }
}
