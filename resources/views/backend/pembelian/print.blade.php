<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pembelian</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="/lte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/lte/dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <table class="tgj"  width='100%'>
      <tr>
        <td width=100></td>
        <td align=center class="judul"><b><font size="5">
          SISTEM INFORMASI PEMBANGUNAN GEDUNG <br /> SARANG BURUNG WALET H. BARMAWI DESA AWANG BESAR</font></b>
          <br/>
          <b>Kabupaten Hulu Sungai Tengah <br></b>
        </td>
        <td width=100></td>
      </tr>
    </table>
    
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
        <address>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        Supplier
        <address>
            <strong>{{$data->supplier->nama}}</strong><br>
          Phone : {{$data->supplier->telp}}
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>No Transaksi {{$data->no_transaksi}}</b><br>
        <br>
        <b>Order ID:</b> {{$data->id}}<br>
        <b>Tgl Pembayaran:</b> {{$data->created_at}}<br>
        <b>Tipe Pembayaran:</b> CASH
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Nomor </th>
            <th>Nama </th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Subtotal</th>
          </tr>
          </thead>
          <tbody>
              @foreach ($data->pembelian_detail as $item)
                <tr>
                    <td>{{$item->bahan->nomor}}</td>
                    <td>{{$item->bahan->nama}}</td>
                    <td>{{$item->jumlah}}</td>
                    <td>@currency($item->harga)</td>
                    <td>@currency($item->subtotal)</td>
                </tr>
              @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-6">
        <p class="lead">Terima Kasih Telah Berbelanja:</p>
      </div>
      <!-- /.col -->
      <div class="col-6">
        <p class="lead">Total Pembayaran</p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Grand Total:</th>
              <td>@currency($data->pembelian_detail->sum('subtotal'))</td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>
