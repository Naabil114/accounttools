@extends('template.tshop')
@section('content')

<form action="{{url('beliproses')}}" method="post">
@csrf
{{-- <br>
  <div class="container">
    
    <div class="col-sm-8">
      <!-- LINE CHART -->
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Pembelian</h3>
  
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
            </button>
            
          </div>
        </div>
        <div class="card-body">
          <input type="hidden" name="id_produk" value="{{$id_produk}}">
          
          <div class="form-group">
            <label>Nama customer</label>
            <input type="text" name="nama_customer" class="form-control">
          </div>
          
          <div class="form-group">
            <label>Telephone</label>
            <input type="number" name="no_hp" class="form-control">
          </div>
          
        </div>
        <!-- /.card-body -->
      </div>
    </div>
    
    <button type="submit">Kirim</button>
  </div> --}}
  <div class="container-fluid mt-4">
    <div class="card align-center shadow" style="width:20rem;">
      <div class="card-body">
        <div class="card-header align-center fs-4">Konfirmasi Pembelian</div>
        <img class="img-fluid" src="{{ asset('storage/produk/' . $produk->foto) }}" class="card-img-top" width="90px" height="50px" alt="Produk 1">
        <p>{{$produk->nama_produk}}</p>
        <p>{{$produk->kategori}}</p>
        <p>{{$produk->resolusi}}</p>
      </div>

      <div class="card">
        <input type="hidden" name="id_produk" value="{{$id_produk}}">
      </div>
      <div class="m-2">
        <button class="rounded bg-success" type="submit">Beli</button>
        <a href="{{url('shop')}}"><button class="rounded bg-danger" type="button">Batal</button></a>
      </div>
    </div>
  </div>
</form>

@endsection