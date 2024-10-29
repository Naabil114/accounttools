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

    <div hidden>
      <a href="{{url('inputproduk')}}" type="button">
        <div class="col-1 mb-3">
          <div class="input-group">
            <span class="input-group-text" style="background-color: #22223b">
              <iconify-icon icon="solar:clapperboard-edit-linear" class="text-light" width="20"></iconify-icon>
              <span class="text-light ms-2" >TAMBAH</span>
            </span>
          </div>
        </div>
      </a>
    </div>

      <table class="table table-bordered">
        <thead class="table-dark">
          <tr>
            <th> No</th>
            <th> ID Transaksi </th>
            <th> Nama Pembeli </th>
            <th> Nama Produk </th>
            <th> Kategori </th>
            <th> Total Harga </th>
            <th> Status </th>
            <th> Tanggal </th>
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
            <td class="text-black">{{$x->id_transaksi}}</td>
            <td class="text-black">{{$x->user->nama}}</td>
            <td class="text-black">{{$x->produk->nama_produk}}</td>
            <td class="text-black">{{$x->produk->kategori}}</td>
            <td class="text-black">{{$x->total}}</td>
            <td class="text-black">
              @if ($x->status === 'unpaid')
              <span class="progress-bar bg-danger text-black">Unpaid</span>
              @elseif($x->status === 'paid')
              <span class="progress-bar bg-success text-black">Paid</span>
              @elseif($x->status === 'dibatalkan')
              <span class="progress-bar bg-warning text-black">Dibatalkan</span>
              @else($x->status === 'selesai')
              <span class="progress-bar bg-info text-black">Selesai</span>
              @endif
            </td>
            <td class="text-black">{{ date('d-m-Y', strtotime($x->created_at)) }}</td>
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection