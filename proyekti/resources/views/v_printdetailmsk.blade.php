
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Invoice</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('template')}}/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template')}}/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('template')}}/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template')}}/dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> Invoice, DKS.
          <small class="pull-right">Date: {{ date('d-M-Y') }}</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
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
</table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
