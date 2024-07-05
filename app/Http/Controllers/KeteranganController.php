<?php

namespace App\Http\Controllers;

use App\Models\Keterangan;
use Illuminate\Http\Request;

class KeteranganController extends Controller
{
    public function index()
    {
        $keterangan = Keterangan::orderBy('id', 'ASC')->get();
        return view('master.keterangan', compact('keterangan'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $keterangan = Keterangan::create($request->all());
        return redirect('/keterangan')->with('status', 'Data Berhasil Disimpan');
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
        $keterangan = Keterangan::find($id);
        $keterangan->update($request->all());
        return redirect('/keterangan')->with('status', 'Data Berhasil Di Ubah');
    }

    public function destroy($id)
    {
        $keterangan = Keterangan::find($id);
        $keterangan->delete();
        return redirect('/keterangan')->with('status', 'Data Berhasil Dihapus');
    }
}
