<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absen;
use App\Models\Jabatan;
use App\Models\Karyawan;
use App\Models\Keterangan;

class HomeController extends Controller
{
    public function index()
    {
    	$keterangan = Keterangan::All();
    	$absen  	= Absen::All();
    	$karyawan  = Karyawan::All();
    	$jabatan = Jabatan::All();

        return view('index', compact('keterangan','absen','karyawan','jabatan'));
    }
}
