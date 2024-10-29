@extends('template.main')
@section('content')

<style>
</style>

<div class="body-wrapper-inner">



  <div class="card bg-transparent">
    <div class="card-body">
      <form method="POST" action="{{ url('simpanproduk') }} " enctype="multipart/form-data">
      @csrf
        <div class="mb-3">

          <label for="id_produk" class="form-label">ID Produk</label>
          <input type="text" class="form-control" name="id_produk" id="id_produk" aria-describedby="idProdukHelp" autofocus required>
          
        </div>
        <div class="mb-3">
          
          <label for="defaultSelect">Pilih Kategori</label>
                            <select
                              class="form-select form-control"
                              id="" name="id_kategori">
                            @foreach ($kategori as $k)
                            <option value="{{$k->id_kategori}}">{{$k->nama}}</option>
                            @endforeach
                          </select>
        </div>
        <div class="mb-3">
          <label for="nama_produk" class="form-label">Nama Produk</label>
          <input type="text" class="form-control" name="nama_produk" id="nama_produk" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" name="email" id="email" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="password" required>
        </div>
        <div class="mb-3">
          <label for="harga" class="form-label">Harga</label>
          <input type="text" class="form-control" name="harga" id="harga" required>
        </div>
        <div class="mb-3">
          <label for="stok" class="form-label">Stok</label>
          <input type="number" class="form-control" name="stok" id="stok" required>
        </div>
        <div class="mb-3">
          <label for="kategori" class="form-label">Kategori</label>
          <select class="form-control" name="kategori" id="kategori" required>
            <option value="">Pilih Kategori</option>
            <option value="Standar">Standar</option>
            <option value="Premium">Premium</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="deskripsi" class="form-label">Deskripsi</label>
          <input type="text" class="form-control" name="deskripsi" id="deskripsi" required>
        </div>
        <div class="mb-3">
          <label for="diskon" class="form-label">Diskon (%)</label>
          <input type="text" class="form-control" name="diskon" id="diskon" value="0" required>
        </div>

        <div class="mb-3">
          <label for="foto" class="form-label"><iconify-icon icon="solar:gallery-wide-bold"></iconify-icon>Foto</label>
          <input type="hidden" class="form-control" name="foto" value="default.png" required>
          <input type="file" class="form-control" name="foto" id="inputFoto" accept=".png, .jpg, .jpeg" onchange="previewImg()" value="default.png" required>
          <!-- <img src="" alt="" class="mt-2 preview w-10"> -->
          <div id="emailHelp" class="form-text text-dark">Upload Gambar Dengan Ekstensi PNG, JPG, atau JPEG.</div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{url('produk')}}" type="button" class="btn btn-warning text-light" >Go Back</a>
      </form>
    </div>
  </div>



</div>
@endsection