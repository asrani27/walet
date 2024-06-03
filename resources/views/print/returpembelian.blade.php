<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
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
  
  
  <table class="tgj"  width='100%'>
    <tr>
      <td width=100></td>
      <td align=center class="judul"><b><font size="5">
        PT. Banua Batuah Banjarmasin<br /></font></b>
        <b>Jl. A. Yani KM 5 Banjarmasin<br></b>
      </td>
      <td width=100></td>
    </tr>
  </table>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        Tanggal : {{\Carbon\Carbon::today()->format('d/m/Y')}}
        <address>
          <strong>PT. Banua Batuah Banjarmasin.</strong><br>
          Jl. A. Yani KM 5 Banjarmasin<br>
          Phone: 0878-2134-5432<br>
          Email: bbb@gmail.com
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <br><br><br>
        <address>
            <h3><strong>LAPORAN RETUR</strong></h3>
            
        </address>
      </div>
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped table-sm">
          <thead>
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>No Transaksi</th>
            <th>Supplier</th>
            <th>Barang Yg Di Retur</th>
            <th>Total</th>
          </tr>
          </thead>
          @php
          $no =1;
          @endphp
          <tbody>
              @foreach ($data as $item)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->no_transaksi}}</td>
                    <td>{{$item->supplier->nama}}</td>
                    <td>
                        <ul>
                        @foreach ($item->retur_pembelian_detail as $i)
                            <li>{{$i->barang->nama}} - {{$i->jumlah}} buah - @currency($i->harga)</li>
                        @endforeach
                        </ul>
                    </td>
                    <td>@currency($item->total)</td>
                </tr>
              @endforeach
          </tbody>
          <tfoot>
              <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td class="text-center">Grand Total</td>
                  <td>@currency($data->sum('total'))</td>
              </tr>
          </tfoot>
          
        </table>
      </div>
      <!-- /.col -->
    </div>
    
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>
