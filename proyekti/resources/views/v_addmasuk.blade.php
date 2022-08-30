@extends('layout.v_template')
@section('title','Add Masuk')

@section('content')

<form action="/masuk/insert" method="POST" enctype="multipart/form-data">
    @csrf 
    <?php $kode_random ="0123456789" ?>

    <div class="content">
        <div class="row">
            <div class="col-sm-6">

             <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}">
                    <div class="text-danger">
                        @error('tanggal')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <input type="hidden" name="kd_masuk" class="form-control" value="<?php echo substr(str_shuffle($kode_random),0,6); ?>">
                    <div class="text-danger">
                        @error('kd_masuk')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Barang Masuk</label>
                    <input name="barang_masuk" class="form-control" value="{{ old('barang_masuk') }}">
                    <div class="text-danger">
                        @error('barang_masuk')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Tujuan</label>
                    <input name="tujuan" class="form-control" value="{{ old('tujuan') }}">
                    <div class="text-danger">
                        @error('tujuan')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Berat</label>
                    <input id="berat" type="number" name="berat" class="form-control" value="{{ old('berat') }}">
                    <input id="harga" type="hidden" name="harga" class="form-control" value="1000">
                    <div class="text-danger">
                        @error('berat')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Bayar</label>
                    <input id="bayar" type="number" name="bayar" class="form-control" value="{{ old('bayar') }}" readonly>
                    <div class="text-danger">
                        @error('bayar')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Pengirim</label>
                    <input name="pengirim" class="form-control" value="{{ old('pengirim') }}">
                    <div class="text-danger">
                        @error('pengirim')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Foto Masuk</label>
                    <input type="file" name="foto_masuk" class="form-control">
                    <div class="text-danger">
                        @error('foto_masuk')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-sm">Simpan</button>
                </div>

            </div>
        </div>
    </div>

</form>

@endsection
