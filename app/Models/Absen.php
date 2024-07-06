<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;

    protected $table = "absen";
    protected $primarykey = "id";

    protected $fillable = [
        'waktu_absen',
        'karyawan',
        'keterangan',
        'created_at',
        'updated_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
