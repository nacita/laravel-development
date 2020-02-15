<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Artikel;

class ArtikelController extends Controller
{
    function index()
    {
        // return DB::table('artikel')->get();
        // SELECT * FROM artikel;
        $artikel = Artikel::where('status', 1)
                            ->get();

        return view('list_artikel', ['artikel' => $artikel]);
    }

    function newArtikel()
    {
        return view('artikel_baru');
    }

    function simpanArtikel(Request $request, $id=null)
    {
        $judul = $request->judul;
        $konten = $request->konten;
        $status = $request->status;

        if(null !== $id) {
            // $simpan = Artikel::find($id);
            $simpan = Artikel::where('id', $id)->first();
        }else{
            $simpan = new Artikel;
        }
        $simpan->judul_artikel = $judul;
        $simpan->content_artikel = $konten;
        $simpan->status = $status;
        $simpan->save();

        if($simpan) {
            return redirect()->route('artikel.index');
        }
    }

    function edit($id)
    {
        $edit = Artikel::find($id);

        return view('show_artikel', ['edit' => $edit, 'id' => $id]);
    }

    function delete($id)
    {
        $artikel = Artikel::find($id);

        if( $artikel->delete() ) {
            return redirect()->route('artikel.index');
        }
    }
}
