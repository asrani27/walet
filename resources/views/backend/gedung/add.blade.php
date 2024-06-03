@extends('layouts.master')

@push('css')
<link rel="stylesheet" href="/lte/plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endpush

@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambah Data gedung</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-outline card-primary">
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{route('gedung')}}">
                    @csrf
                  <div class="card-body">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Kode Gedung</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="kode" value="GD{{$kode}}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Jenis gedung</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="jenis" placeholder="jenis gedung">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">ukuran</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="ukuran" placeholder="ukuran">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Model</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="model" placeholder="model">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Luas</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="luas" placeholder="luas">
                      </div>
                    </div>
                    
                    
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Harga</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="harga" placeholder="0" required onkeypress="return hanyaAngka(event)"/>
                      </div>
                    </div>
                    
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-info"><i class="icon fas fa-check"></i>
                        Simpan</button>
                    <a href="/gedung" class="btn btn-default float-right">Kembali</a>
                  </div>
                  <!-- /.card-footer -->
                </form>
              </div>
          </div>
        </div>
      </div>
    </section>
    
</div>
@endsection

@push('js')
<script>
  function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
     if (charCode > 31 && (charCode < 48 || charCode > 57))

      return false;
    return true;
  }
</script>

<script>
  function tandaPemisahTitik(b){
  var _minus = false;
  if (b<0) _minus = true;
  b = b.toString();
  b=b.replace(".","");
  b=b.replace("-","");
  c = "";
  panjang = b.length;
  j = 0;
  for (i = panjang; i > 0; i--){
  j = j + 1;
  if (((j % 3) == 1) && (j != 1)){
  c = b.substr(i-1,1) + "." + c;
  } else {
  c = b.substr(i-1,1) + c;
  }
  }
  if (_minus) c = "-" + c ;
  return c;
  }

  function numbersonly(ini, e){
  if (e.keyCode>=49){
  if(e.keyCode<=57){
  a = ini.value.toString().replace(".","");
  b = a.replace(/[^\d]/g,"");
  b = (b=="0")?String.fromCharCode(e.keyCode):b + String.fromCharCode(e.keyCode);
  ini.value = tandaPemisahTitik(b);
  return false;
  }
  else if(e.keyCode<=105){
  if(e.keyCode>=96){
  //e.keycode = e.keycode - 47;
  a = ini.value.toString().replace(".","");
  b = a.replace(/[^\d]/g,"");
  b = (b=="0")?String.fromCharCode(e.keyCode-48):b + String.fromCharCode(e.keyCode-48);
  ini.value = tandaPemisahTitik(b);
  //alert(e.keycode);
  return false;
  }
  else {return false;}
  }
  else {
  return false; }
  }else if (e.keyCode==48){
  a = ini.value.replace(".","") + String.fromCharCode(e.keyCode);
  b = a.replace(/[^\d]/g,"");
  if (parseFloat(b)!=0){
  ini.value = tandaPemisahTitik(b);
  return false;
  } else {
  return false;
  }
  }else if (e.keyCode==95){
  a = ini.value.replace(".","") + String.fromCharCode(e.keyCode-48);
  b = a.replace(/[^\d]/g,"");
  if (parseFloat(b)!=0){
  ini.value = tandaPemisahTitik(b);
  return false;
  } else {
  return false;
  }
  }else if (e.keyCode==8 || e.keycode==46){
  a = ini.value.replace(".","");
  b = a.replace(/[^\d]/g,"");
  b = b.substr(0,b.length -1);
  if (tandaPemisahTitik(b)!=""){
  ini.value = tandaPemisahTitik(b);
  } else {
  ini.value = "";
  }

  return false;
  } else if (e.keyCode==9){
  return true;
  } else if (e.keyCode==17){
  return true;
  } else {
  //alert (e.keyCode);
  return false;
  }

}
</script>
@endpush
