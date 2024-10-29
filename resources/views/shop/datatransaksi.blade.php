@extends('template.tshop')
@section('content')

<div class="container">
  <br>
  <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title" style="font-weight: bold; text-align: center;">Pembayaran Transaksi</h3>
  
                 
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr align="center">
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $x => $item)
                      @if($item->status === 'unpaid')
                              <tr>
                                <td style="text-align: center;">{{ ++$x }}</td>
                                <td style="text-align: center;">{{ $item->nama_produk }}</td>
                                <td style="text-align: center;">{{ $item->kategori }}</td>
                                <td style="text-align: center;">{{ $item->total }}</td>                                
                                <td style="text-align: center;">
                                  @if ($item->status === 'unpaid')
                                          <span class="badge text-bg-danger">Unpaid</span>
                                      @elseif($item->status === 'Paid')
                                          <span class="badge text-bg-success">Paid</span>
                                      @else
                                      <span class="badge text-bg-primary">Selesai</span>
                                      @endif
                                </td>
                                  
                                  <td style="text-align: center;">
                                  @if ($item->status === 'unpaid')
                                      
                                      <a href="{{ url('bayar', ['id_transaksi' => $item->id_transaksi]) }}"
                                          class="btn btn-success my-1">Bayar</a>
                                          <td>

                                          
                                        </td>
                                          @endif
                                  </td>
                              </tr>
                    @else
                    
                    @endif
                          @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
  </div>
</div>
@endsection