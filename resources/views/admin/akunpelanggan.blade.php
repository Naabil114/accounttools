@extends('template.main')
@section('content')

<div class="body-wrapper-inner">
  <div class="container-fluid">
    <!--  Row 1 -->
    <div class="row">
      <!-- Box 1 -->
      <a href="{{url('inputakunpelanggan')}}" type="button">
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
            <th> NIK </th>
            <th> Nama </th>
            <th> Email </th>
            <th> No Hp </th>
            <th> Alamat </th>
            <th> Role </th>
            <th> Status </th>
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
          @if ($x->is_active === 1)
          
          @if ($x->role === 'pelanggan')
          <tr class="table-primary">
            
            @else
            <tr class="table-danger">
              @endif
              
          
            <!-- <td>{{++$y}}</td> -->
            <td class="text-black"><img src="{{ asset('storage/user/' . $x->foto) }}" style=" border-radius: 50%;" width="50" height="45"></td>
            <td class="text-black"> {{$x->nik}} </td>
            <td class="text-black"> {{$x->nama}} </td>
            <td class="text-black"> {{$x->email}} </td>
            <td class="text-black"> {{$x->tlp}} </td>
            <td class="text-black"> {{$x->alamat}} </td>
            <!-- <td>{{$x->password}}</td> -->
            <td class="text-black">
              @if ($x->role === 'admin')
              <span class="">Admin</span>
              @else
              <span class="">Pelanggan</span>
              @endif
            </td>
            <td class="text-black">
              @if ($x->is_active === 1)
              <span class="">Aktif</span>
              @else
              <span class="">Nonaktif</span>
              @endif
            </td>
            <td class="text-black">
              
              <!-- <div class="d-flex justify-content-around"> -->
              <a href="{{url("editakunpelanggan/$x->id/edit") }}" data-id="{{ $x->id }}">
                <button type="button" class="btn">
                  <iconify-icon icon="solar:clapperboard-edit-linear" class="text-black" width="20"></iconify-icon>
                </button>
              </a>

              <form action="{{ url('softdeletepelanggan', $x->id) }}" method="POST" class="row mb-0">
                @csrf
                @method('PUT')
                <button type="submit" class="btn" onclick="return confirm('Are you sure you want to soft delete this product?');">
                  <iconify-icon icon="solar:trash-bin-2-broken" class="text-black" width="20"
                  style="margin-left: -25px;"></iconify-icon>
                </button>
              </form>
            <!-- </div> -->
            
          </td>
        </tr>
        @endif
          @endforeach
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
@endsection