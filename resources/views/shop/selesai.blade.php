@extends('template.tshop')
@section('content')
{{-- <div class="container">

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
                      <tr>
                        <th>No</th>
                        <th>ID Transaksi</th>
                        <th>Email Akun</th>
                        <th>Password</th>
                        
                        
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $x => $item)
                      @if($item->status === 'paid')
                              <tr>
                              <td>{{ ++$x }}</td>
                                  <td>{{ $item->id_transaksi }}</td>
                                  <td>{{ $item->email }}</td>
                                  <td>{{ $item->password }}</td>
                                  <td>
                                  <form action="{{ route('transaksi.update_status', $item->id_transaksi) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-outline-primary">Done</button>
                                        </form>
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
</div> --}}

<div class="container-fluid align-center">
	@foreach ($data as $x => $item)
  @if($item->status === 'paid')
	<div class="card shadow w-25" style="float: center; margin: 40px;">
		<figure class="product-style">
			<img class="img-fluid" src="{{ asset('storage/produk/' . $item->foto) }}" class="card-img-top" alt="Produk 1">
		</figure>
	  
	  <div class="card-body">
				<figcaption>
					<h5>ID Transaksi : {{$item->id_transaksi}}</h5>
					<h5>Email Akun :{{$item->email}}</h5>
					<h5>Password : {{$item->password}}</h5>
          <form action="{{ route('transaksi.update_status', $item->id_transaksi) }}" method="POST" class="row mb-0">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-success btn-lg align-center">Selesai</button>
          </form>
				</figcaption>
		  </figure>
	  </div>
	</div>
  @else         
  @endif
	@endforeach
</div>
@endsection