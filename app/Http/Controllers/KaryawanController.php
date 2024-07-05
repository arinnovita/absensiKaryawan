<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::orderBy('id', 'ASC')->get();
        $jabatan = Jabatan::orderBy('id', 'ASC')->get();
        return view('master.karyawan', compact('karyawan','jabatan'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $karyawan = Karyawan::create($request->all());
        return redirect('/karyawan')->with('status', 'Data Berhasil Disimpan');
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
        $karyawan = Karyawan::find($id);
        $karyawan->update($request->all());
        return redirect('/karyawan')->with('status', 'Data Berhasil Di Ubah');
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::find($id);
        $karyawan->delete();
        return redirect('/karyawan')->with('status', 'Data Berhasil Dihapus');
    }
}
