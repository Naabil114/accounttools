@extends('template.main')
@section('content')

<div class="body-wrapper-inner">
  <div class="container-fluid">
    <!--  Row 1 -->
    <div class="row">
      <!-- Box 1 -->
      <div class="col-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-center gap-6 mb-4 pb-3">
              <span class="round-48 d-flex align-items-center justify-content-center rounded bg-success-subtle">
                <iconify-icon icon="solar:chart-2-broken" class="fs-6 text-ternary"></iconify-icon>
              </span>
              <h6 class="mb-0 fs-4">Jumlah Produk Keseluruhan</h6>
            </div>
            <div class="row">
              <div class="col-6">
                <h4>{{ $dataProduct }}</h4>
                <small>Produk</small>
              </div>
              <div class="col-6">
              </div>
            </div>
            <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="25"
              aria-valuemin="0" aria-valuemax="100" style="height: 8px;">
              <div class="progress-bar bg-success" style="width: 83%"></div>
            </div>
          </div>
        </div>
      </div>

      <!-- Box 2 -->
      <div class="col-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-center gap-6 mb-4">
              <span class="round-48 d-flex align-items-center justify-content-center rounded bg-danger-subtle">
                <iconify-icon icon="solar:box-linear" class="fs-6 text-danger"></iconify-icon>
              </span>
              <h6 class="mb-0 fs-4">Jumlah Transaksi</h6>
            </div>
            <div class="row">
              <div class="col-6">
                <h4>{{ $dataTransaksi }}</h4>
              </div>
              <div class="col-6">
                <div id="total-income"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Box 3 -->
      <div class="col-4">
        <div class=" text-center" style="height: 130px;" style="background-color: aliceblue;">
          <div class="card">
            <div class="card-body w-100">
              <h5 class="card-title fw-semibold mb-4">List Produk</h5>
              <div class="table-responsive" data-simplebar>
                <table class="table text-nowrap align-middle table-custom mb-0">
                  <thead>
                    <tr>
                      <th scope="col" class="text-dark fw-normal ps-0">Produk
                      </th>
                      <th scope="col" class="text-dark fw-normal">Jumlah Produk</th>
                    </tr> 
                  </thead>
                  <tbody>
                    @foreach ($kategori as $k)
                    
                    <tr>
                      <td class="ps-0">
                        <div class="d-flex align-items-center gap-6">
                          <img src="{{ asset('storage/kategori/' . $k->kategoriakun->foto) }}" alt="prd1" width="48" height="35"
                          class="rounded" />
                          <div>
                            <h6 class="mb-0">{{$k->kategoriakun->nama}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <span>{{$k->total_produk}}</span>
                        <small>Produk</small>
                      </td>
                    </tr> 
                    @endforeach
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <!-- Box 4 -->
      <div class="col-8">
        <div class="card">
          <div class="card-body">
            <h6 class="fs-4 mb-3">Order Terbaru</h6>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th class="text-black"> Order ID </th>
                  <th class="text-black"> Nama Pelanggan </th>
                  <th class="text-black"> Item </th>
                  <th class="text-black"> Status </th>
                </tr>
              </thead>
              <tbody>

                @foreach ( $data as $t )

                <tr>
                  <td class="text-black">
                    <a href="{{url('transaksi')}}">{{$t->id_transaksi}}</a>
                  </td>
                  <td class="text-black"> {{ $t->user->nama }} </td>
                  <td class="text-black"> {{ $t->produk->nama_produk }} </td>
                  @if ($t->status == 'unpaid')
                    <td><span class="badge bg-danger text-black">Unpaid</span></td>
                    @elseif ($t->status == 'paid')
                    <td><span class="badge bg-success text-black">Paid</span></td>
                    @elseif ($t->status == 'selesai')
                    <td><span class="badge bg-info text-black">Selesai</span></td>
                    @else ($t->status == 'dibatalkan')
                    <td><span class="badge bg-warning text-black">Dibatalkan</span></td>
                  @endif
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection