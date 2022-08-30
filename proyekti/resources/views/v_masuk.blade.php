@extends('layout.v_template')
@section('title','Masuk')

@section('content')
    <a href="/masuk/add" class="btn btn-primary btn-sm">Add</a>
    <a href="/masuk/printmsk" target="_blank" class="btn btn-success btn-sm">Print To Printer</a>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#printpertgl">
  Print Per Tanggal
  </button>

    @if (session('pesan'))
    <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> Success!</h4>
    {{ session('pesan') }}
    </div>
    @endif

    <table class='table table bordered'>
        <thead>
            <tr> 
                <th>No</th>
                <th>Tanggal</th>
                <th>Kode Masuk</th>
                <th>Barang Masuk</th>
                <th>Tujuan</th>
                <th>Berat</th>
                <th>Bayar</th>
                <th>Pengirim</th>
                <th>Foto Masuk</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; ?>
            @foreach ($masuk as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->tanggal }}</td>
                    <td>{{ $data->kd_masuk }}</td>
                    <td>{{ $data->barang_masuk }}</td>
                    <td>{{ $data->tujuan }}</td>
                    <td>{{ $data->berat }}</td>
                    <td>{{ $data->bayar }}</td>
                    <td>{{ $data->pengirim }}</td>
                    <td><img src="{{ url('foto_masuk/'.$data->foto_masuk) }}" width="100px"></td>
                    <td>
                        <a href="/masuk/detail/{{ $data->id_masuk }}" class="btn btn-sm btn-success">Detail</a>
                        <a href="/masuk/edit/{{ $data->id_masuk }}" class="btn btn-sm btn-warning">Edit</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_masuk }}">
                        Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@foreach ($masuk as $data)
    <div class="modal modal-danger fade" id="delete{{ $data->id_masuk }}">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{ $data->barang_masuk }}</h4>
              </div>
              <div class="modal-body">
                <p>Apakah Anda Yakin Ingin Menghapus Data Ini..??</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                <a href="/masuk/delete/{{ $data->id_masuk }}" class="btn btn-outline">Yes</a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
@endforeach
    
    @foreach ($masuk as $data)
        <div class="modal modal-default fade" id="printpertgl">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Print Per Tanggal</h4>
                    </div>
                    <div class="modal-body">
                    <div class="row">
          <div class="col-sm-12">
              <div class="form-group">
                  <label for="tgl_awal">Tanggal Awal</label>
                  <input type="date" name="tgl_awal" class="form-control @error('tgl_awal') is-invalid @enderror" id="tgl_awal" value="{{old('tgl_awal')}}">
              </div>
          <div>
          <div class="form-group">
                  <label for="tgl_akhir">Tanggal Akhir</label>
                  <input type="date" name="tgl_akhir" class="form-control @error('tgl_akhir') is-invalid @enderror" id="tgl_akhir" value="{{old('tgl_akhir')}}">
              </div>
          </div>
      </div>
                  </div>
                  <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <a href="" onclick="this.href='/print/masuk_per_tgl/'+ document.getElementById('tgl_awal').value + '/' + document.getElementById('tgl_akhir').value "
                      target="_blank" class="btn btn-info">
                          Print
                      </a>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
    @endforeach

@endsection