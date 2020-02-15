<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesController extends Controller
{
    function coba($nama)
    {
        return "Halo " . $nama;
    }

    function cobaview($nama)
    {
        return view('beranda', ['nama' => $nama]);
    }
}
