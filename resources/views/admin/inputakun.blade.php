@extends('template.main')
@section('content')

<style>
</style>

<div class="body-wrapper-inner">



  <div class="card bg-transparent">
    <div class="card-body">
      <form method="POST" action="{{ url('simpanakun') }} " enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="nik" class="form-label">NIK</label>
          <input type="text" class="form-control" name="nik" id="nik" aria-describedby="nikHelp">

        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" name="nama" id="nama">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" name="email" id="email">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="mb-3">
          <label for="password_confirm" class="form-label">Konfirmasi Password</label>
          <input type="password" class="form-control" name="password_confirm" id="password_confirm">
        </div>
        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <input type="text" class="form-control" name="alamat" id="alamat">
        </div>
        <div class="">
          <label for="tlp" class="form-label">No Hp</label>
          <input type="number" class="form-control" name="tlp" id="tlp">
        </div>
        <div class="">
          <label for="tlp_gabung" class="form-label"></label>
          <input type="number" class="form-control" name="tlp_gabung" id="tlp_gabung" value="2004-12-12" hidden>
        </div>
        <div class="mb-3">
          <label for="role" class="form-label">Role</label>
          <select class="form-control" name="role" id="role">
            <option value="">Pilih Role</option>
            <option value="admin">Admin</option>
            <option value="pelanggan">Pelanggan</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="foto" class="form-label"><iconify-icon icon="solar:gallery-wide-bold"></iconify-icon>Foto</label>
          <input type="hidden" class="form-control" name="foto" value="default.png">
          <input type="file" class="form-control" name="foto" id="inputFoto" accept=".png, .jpg, .jpeg" onchange="previewImg()" value="default.png">
          <!-- <img src="" alt="" class="mt-2 preview w-10"> -->
          <div id="emailHelp" class="form-text text-dark">Upload Gambar Dengan Ekstensi PNG, JPG, atau JPEG.</div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{url('akun')}}" type="button" class="btn btn-warning text-light">Go Back</a>
      </form>
    </div>
  </div>



</div>
@endsection