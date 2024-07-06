<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absen;
use App\Models\Karyawan;
use App\Models\Keterangan;


class AbsenController extends Controller
{
    public function index()
    {
        $keterangan = Keterangan::orderBy('id', 'ASC')->get();
        $karyawan = Karyawan::orderBy('id', 'ASC')->get();
        $absen = Absen::orderBy('id', 'ASC')->get();
        return view('absen.absen', compact('absen','karyawan','keterangan'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $absen = Absen::create($request->all());
        return redirect('/absen')->with('status', 'Data Berhasil Disimpan');
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
        //
    }

    public function destroy($id)
    {
        //
    }
}
