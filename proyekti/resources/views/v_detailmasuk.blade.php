@extends('layout.v_template')
@section('title','Detail Masuk')
@section('content')

<a href="/detailmasuk/printdetailmsk/{{ $masuk->id_masuk }}" target="_blank" class="btn btn-success btn-sm">Print To Printer</a>

<table class="table">  
    <tr>
        <th width="100px">Tanggal</th>
        <th width="30px">:</th>
        <th>{{ $masuk->tanggal }}</th>   
    </tr>
    <tr>
        <th width="100px">Kode Masuk</th>
        <th width="30px">:</th>
        <th>{{ $masuk->kd_masuk }}</th>   
    </tr>
    <tr>
        <th width="100px">Barang Masuk</th>
        <th width="30px">:</th>
        <th>{{ $masuk->barang_masuk }}</th>   
    </tr>
    <tr>
        <th width="100px">Tujuan</th>
        <th width="30px">:</th>
        <th>{{ $masuk->tujuan }}</th>   
    </tr>
    <tr>
        <th width="100px">Berat</th>
        <th width="30px">:</th>
        <th>{{ $masuk->berat }}</th>   
    </tr>
    <tr>
        <th width="100px">Bayar</th>
        <th width="30px">:</th>
        <th>{{ $masuk->bayar }}</th>   
    </tr>
    <tr>
        <th width="100px">Pengirim</th>
        <th width="30px">:</th>
        <th>{{ $masuk->pengirim }}</th>   
    </tr>
    <tr>
        <th width="100px">Foto</th>
        <th width="30px">:</th>
        <th><img src="{{ url('foto_masuk/'.$masuk->foto_masuk) }}" width="400px"></th>   
    </tr>
    <tr>
        <th><a href="/masuk" class="btn btn-success tbn-sm">Kembali</a></th>
    </tr>
</table>

@endsection