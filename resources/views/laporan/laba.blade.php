@extends('layouts.master')

@push('css')
<link rel="stylesheet" href="/lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush

@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Laba / Keuntungan</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-outline card-primary">
              {{-- <div class="card-header">
              </div> --}}
              <!-- /.card-header -->
              <div class="card-body">
                  <form action="/laporan/laba/tampilkan" method="get">
                    <select name="bulan">
                      <option value="01">Januari</option>
                      <option value="02">Februari</option>
                      <option value="03">Maret</option>
                      <option value="04">April</option>
                      <option value="05">Mei</option>
                      <option value="06">Juni</option>
                      <option value="07">Juli</option>
                      <option value="08">Agustus</option>
                      <option value="09">September</option>
                      <option value="10">Oktober</option>
                      <option value="11">November</option>
                      <option value="12">Desember</option>
                    </select>
                      <select name="tahun">
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                        <option value="2018">2018</option>
                      </select>
                      <button type="submit" class="btn btn-sm btn-primary">Tampilkan!</button>
                  </form>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
        @if(count($penjualan) != 0)
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Penjualan : @currency($penjualan->sum('total'))</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th>No Trans</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($penjualan as $item)
                        
                    <tr>
                      <td>{{\Carbon\Carbon::parse($item->created_at)->format('d M Y')}}</td>
                      <td>{{$item->no_transaksi}}</td>
                      <td>@currency($item->total)</td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                  <tfoot>
                    <tr>
                      <td></td>
                      <td></td>
                      <td>@currency($penjualan->sum('total'))</td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-6">    
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Pengeluaran : @currency($pengeluaran->sum('jumlah'))</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th>Nama Pengeluaran</th>
                      <th>Jumlah</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($pengeluaran as $item)
                        
                    <tr>
                      <td>{{\Carbon\Carbon::parse($item->tanggal)->format('d M Y')}}</td>
                      <td>{{$item->nama}}</td>
                      <td>@currency($item->jumlah)</td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                  <tfoot>
                    <tr>
                      <td></td>
                      <td></td>
                      <td>@currency($pengeluaran->sum('jumlah'))</td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card card-outline card-primary">
              <div class="card-body">
                Laba :  @currency($penjualan->sum('total')) - @currency($pengeluaran->sum('jumlah')) = @currency($penjualan->sum('total') - $pengeluaran->sum('jumlah'))
              </div>
            </div>
          </div>
        </div>
        @endif
      </div>
    </section>
    
</div>
@endsection

@push('js')

@endpush
