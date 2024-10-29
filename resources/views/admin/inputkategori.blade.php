@extends('template.main')
@section('content')

<style>
</style>

<div class="body-wrapper-inner">



  <div class="card bg-transparent">
    <div class="card-body">
      <form method="POST" action="{{ url('simpankategori') }} " enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" name="nama" id="nama">
        </div>

        <div class="mb-3">
          <label for="foto" class="form-label"><iconify-icon icon="solar:gallery-wide-bold"></iconify-icon>Foto</label>
          <input type="hidden" class="form-control" name="foto" value="default.png">
          <input type="file" class="form-control" name="foto" id="inputFoto" accept=".png, .jpg, .jpeg" onchange="previewImg()" value="default.png">
          <!-- <img src="" alt="" class="mt-2 preview w-10"> -->
          <div id="emailHelp" class="form-text text-dark">Upload Gambar Dengan Ekstensi PNG, JPG, atau JPEG.</div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{url('kategori')}}" type="button" class="btn btn-warning text-light">Go Back</a>
      </form>
    </div>
  </div>



</div>
@endsection