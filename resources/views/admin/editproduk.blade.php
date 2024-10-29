@extends('template.main')
@section('content')

<style>
</style>

<div class="body-wrapper-inner">



  <div class="card bg-transparent">
    <div class="card-body">
      <form method="POST" action="{{ url("updateproduk/{$data->id_produk}") }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="id_produk" class="form-label">ID Produk</label>
          <input type="text" class="form-control" name="id_produk" id="id_produk" aria-describedby="idProdukHelp" value="{{$data->id_produk}}" readonly>
          <div id="emailHelp" class="form-text text-dark">ID Produk Tidak Dapat Diubah</div>
        </div>
        <div class="mb-3">
          <label for="nama_produk" class="form-label">Nama Produk</label>
          <input type="text" class="form-control" name="nama_produk" id="nama_produk" value="{{$data->nama_produk}}">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" name="email" id="email" value="{{$data->email}}">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="password" value="{{$data->password}}">
        </div>
        <div class="mb-3">
                            <label for="defaultSelect">Kategori Akun</label>
                            <select
                              class="form-select form-control"
                              id="" name="id_kategori"
                            @foreach ($k as $p)
                            
                            <option value="{{$p->id_kategori}}">{{$p->nama}}</option>
                            @endforeach
                          </select>
                          </div>
        <div class="mb-3">
          <label for="harga" class="form-label">Harga</label>
          <input type="text" class="form-control" name="harga" id="harga" value="{{$data->harga}}">
        </div>
        <div class="mb-3">
          <label for="stok" class="form-label">Stok</label>
          <input type="number" class="form-control" name="stok" id="stok" value="{{$data->stok}}">
        </div>
        <div class="mb-3">
          <label for="kategori" class="form-label">Kategori</label>
          <select class="form-control" name="kategori" id="kategori">
            <option value="">Pilih Kategori</option>
            <option value="Standar" {{ $data->kategori === 'Standar' ? 'selected' : '' }}>Standar</option>
            <option value="Premium" {{ $data->kategori === 'Premium' ? 'selected' : '' }}>Premium</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="deskripsi" class="form-label">Deskripsi</label>
          <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="{{$data->deskripsi}}">
        </div>
        <div class="mb-3">
          <label for="diskon" class="form-label">Diskon (%)</label>
          <input type="text" class="form-control" name="diskon" id="diskon" value="{{$data->diskon}}">
        </div>

        <div class="form-group">
                  <label for="exampleInputPassword1">Foto</label>
                    <input type="hidden" name="foto" value="{{$data->foto}}">
                    <img src="{{ asset('storage/produk/' . $data->foto) }}" class="mb-2 preview"
                                style="width: 100px;">
                    <input type="file" class="form-control" accept=".png, .jpg, .jpeg" id="inputFoto"
                                name="foto" onchange="previewImg()">
                  </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{url('produk')}}" type="button" class="btn btn-warning text-light">Go Back</a>
      </form>
    </div>
  </div>



</div>
@endsection