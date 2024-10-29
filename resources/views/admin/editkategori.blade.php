@extends('template.main')
@section('content')

<style>
</style>

<div class="body-wrapper-inner">



  <div class="card bg-transparent">
    <div class="card-body"> 
    <form method="POST" action="{{ url("updatekategori/{$data->id_kategori}") }} " enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" name="nama" id="nama" value="{{$data->nama}}">
        </div>
        <div class="form-group">
                  <label for="exampleInputPassword1">Foto</label>
                    <input type="hidden" name="foto" value="{{$data->foto}}">
                    <img src="{{ asset('storage/kategori/' . $data->foto) }}" class="mb-2 preview"
                                style="width: 100px;">
                    <input type="file" class="form-control" accept=".png, .jpg, .jpeg" id="inputFoto"
                                name="foto" onchange="previewImg()">
                  </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{url('kategori')}}" type="button" class="btn btn-warning text-light">Go Back</a>
      </form>
    </div>
  </div>



</div>
@endsection