<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Artikel;
use Storage;

class ArtikelController extends Controller
{
    function index()
    {
        // return DB::table('artikel')->get();
        // SELECT * FROM artikel;
        $artikel = Artikel::where('status', 1)
                            ->get();
        $lokasi_gambar = Storage::disk('gambar_dir')->url('/');

        return view('list_artikel', ['artikel' => $artikel, 'lokasi_gambar' => $lokasi_gambar]);
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
        // dd($request->file('gambar'));
        if($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $store = Storage::disk('gambar_dir')->put('/', $gambar);
            // $store = Storage::disk('gambar_dir')->putFileAs('/', $gambar, $gambar->getClientOriginalName());


            $simpan->gambar = basename($store);
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
            Storage::disk('gambar_dir')->delete($artikel->gambar);
            return redirect()->route('artikel.index');
        }
    }
}
