@extends('template.main')
@section('content')

<style>
</style>

<div class="body-wrapper-inner">



  <div class="card bg-transparent">
    <div class="card-body"> 
    <form method="POST" action="{{ url("updateakunpelanggan/{$data->id}") }} " enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="nik" class="form-label">NIK</label>
          <input type="text" class="form-control" name="nik" id="nik" value="{{$data->nik}}" aria-describedby="nikHelp">

        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" name="nama" id="nama" value="{{$data->nama}}">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" name="email" id="email" value="{{$data->email}}" >
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
          <input type="text" class="form-control" name="alamat" id="alamat" value="{{$data->alamat}}">
        </div>
        <div class="">
          <label for="tlp" class="form-label">No Hp</label>
          <input type="number" class="form-control" name="tlp" id="tlp" value="{{$data->tlp}}">
        </div>
        <div class="">
          <label for="tlp_gabung" class="form-label"></label>
          <input type="number" class="form-control" name="tlp_gabung" id="tlp_gabung" value="2004-12-12" hidden>
        </div>
        <div class="mb-3">
                    <label for="exampleInputEmail1">Role</label>
                    <select class="form-control" name="role" id="role">
                      <option value=""> Pilih Type </option>
                      <option value="admin" {{ $data->role === 'admin' ? 'selected' : '' }}>Admin</option>
                      <option value="pelanggan" {{ $data->role === 'pelanggan' ? 'selected' : '' }}>Pelanggan</option>
                          
                    </select>
                  </div>
                  <div class="form-group">
                  <label for="exampleInputPassword1">Foto</label>
                    <input type="hidden" name="foto" value="{{$data->foto}}">
                    <img src="{{ asset('storage/user/' . $data->foto) }}" class="mb-2 preview"
                                style="width: 100px;">
                    <input type="file" class="form-control" accept=".png, .jpg, .jpeg" id="inputFoto"
                                name="foto" onchange="previewImg()">
                  </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{url('akunpelanggan')}}" type="button" class="btn btn-warning text-light">Go Back</a>
      </form>
    </div>
  </div>



</div>
@endsection