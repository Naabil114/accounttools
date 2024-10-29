@extends('template.main')
@section('content')

<div class="body-wrapper-inner">
  <div class="container-fluid">
    <!--  Row 1 -->
    <div class="row">
      <!-- Box 1 -->
      <a href="{{url('inputkategori')}}" type="button">
        <div class="col-1 mb-3">
          <div class="input-group">
            <span class="input-group-text" style="background-color: #22223b">
              <iconify-icon icon="solar:clapperboard-edit-linear" class="text-light" width="20"></iconify-icon>
              <span class="text-light ms-2" >TAMBAH</span>
            </span>
          </div>
        </div>
      </a>  


      <table class="table">
        <thead class="table-dark">
          <tr>
            <th> Foto </th>
            <th> Nama </th>
            <th> Action </th>
          </tr>
        </thead>
        <tbody>
          @if ($data->isEmpty())
          <tr class="text-center">
            <td colspan="9">Belum ada akun</td>
          </tr>
          @else
          @foreach ($data as $y => $x)

          <tr>
            <!-- <td>{{++$y}}</td> -->
            <td class="text-black"><img src="{{ asset('storage/kategori/' . $x->foto) }}" style=" border-radius: 50%;" width="50" height="45"></td>
            <td class="text-black"> {{$x->nama}} </td>
            <!-- <td>{{$x->password}}</td> -->
            
            
            <td class="text-black">

            <!-- <div class="d-flex justify-content-around"> -->
            <a href="{{url("editkategori/$x->id_kategori/edit") }}" data-id="{{ $x->id_kategori }}">
                <button type="button" class="btn">
                  <iconify-icon icon="solar:clapperboard-edit-linear" class="text-black" width="20"></iconify-icon>
                </button>
              </a>

              <form method="POST" action="{{url('deletekategori/' . $x->id_kategori) }}" class="d-inline">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn">
                  <iconify-icon icon="solar:trash-bin-2-broken" class="text-black" width="20"></iconify-icon>
                </button>
              </form>
            <!-- </div> -->

            </td>
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
@endsection