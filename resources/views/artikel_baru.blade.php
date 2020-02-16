@extends('layout')

@section('judul', 'Tambah Artikel')

@section('content')
    <form action="{{ route('artikel.simpanArtikel') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Judul<label> <br>
        <input type="text" name="judul" placeholder="Masukkan Judul">
        <br>
        <br>
        <label>Konten<label><br>
        <textarea cols="20" rows="10" name="konten"></textarea>
        <br>
        <br>
        <label>Status<label>
        <input type="radio" name="status" value="1">Aktif
        <input type="radio" name="status" value="0">Tidak Aktif
        <br>
        <br>
        <input type="file" name="gambar" accept="image/jpeg,image/jpg,image/png">
        <br>
        <br>
        <input type="submit" name="submit" value="Submit">
        <input type="reset" name="reset" value="Reset">
    </form>
@endsection
