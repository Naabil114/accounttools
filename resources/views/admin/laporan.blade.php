@extends('template.main')
@section('content')

<style>
  #bg-edit-manual {
    background-color: transparent;
    height: 665px;
  }

  ;
</style>

<div class="body-wrapper-inner">
  <div class="card col-12" id="bg-edit-manual">
    <div class="card-body">



      <div class="col-3 mb-3">
        <div class="input-group">
          <button   class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #22223b;">
        <iconify-icon icon="solar:server-square-update-broken" class="text-light" width="20"></iconify-icon>
        <span class="text-light ms-2">BULAN</span>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item" href="{{url('/laporan?bulan=1')}}">January</a></li>
        <li><a class="dropdown-item" href="{{url('/laporan?bulan=2')}}">February</a></li>
        <li><a class="dropdown-item" href="{{url('/laporan?bulan=3')}}">March</a></li>
        <li><a class="dropdown-item" href="{{url('/laporan?bulan=4')}}">April</a></li>
        <li><a class="dropdown-item" href="{{url('/laporan?bulan=5')}}">May</a></li>
        <li><a class="dropdown-item" href="{{url('/laporan?bulan=6')}}">June</a></li>
        <li><a class="dropdown-item" href="{{url('/laporan?bulan=7')}}">July</a></li>
        <li><a class="dropdown-item" href="{{url('/laporan?bulan=8')}}">August</a></li>
        <li><a class="dropdown-item" href="{{url('/laporan?bulan=9')}}">September</a></li>
        <li><a class="dropdown-item" href="{{url('/laporan?bulan=10')}}">October</a></li>
        <li><a class="dropdown-item" href="{{url('/laporan?bulan=11')}}">November</a></li>
        <li><a class="dropdown-item" href="{{url('/laporan?bulan=12')}}">December</a></li>
          </ul>
        </div>
      </div>




      <table class="table table-bordered">
        <thead class="table-dark">
          <tr>
            <th> No </th>
            <th> Nama Produk </th>
            <th> Kategori </th>
            <th> Terjual </th>
            <th> Total </th>
          </tr>
        </thead>
        <tbody>
          @if ($data->isEmpty())
          <tr class="text-center">
            <td>Belum ada transaksi</td>
          </tr>
          @else
          @foreach ($data as $y => $x)

          <tr>
            <td class="text-black">{{$y+1}}</td>
            <td class="text-black">{{$x->nama_produk}}</td>
            <td class="text-black">{{$x->kategori}}</td>
            <td class="text-black">{{$x->terjual}}</td>
            <td class="text-black">{{$x->total}}</td>
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection