@extends('template.tshop')
@section('content')

<div class=container-fluid>
	@foreach ($data as $n)
	<div class="card shadow" style="width: 15rem; float: left; margin: 40px;">
		<figure class="product-style">
			<img class="img-fluid" src="{{ asset('storage/produk/' . $n->foto) }}" class="card-img-top" alt="Produk 1">
			<form action="{{url('beli')}}" method="post">
				@csrf
			   <input type="hidden" name="id_produk" value="{{$n->id_produk}}">
			   @if ($n->stok == 0)

			   @else
				 <button type="submit" class="add-to-cart" data-product-tile="add-to-cart">
					Beli
				 </button>
				@endif
				</form>
		</figure>
	  
	  <div class="card-body">
				<figcaption>
					<h3>{{$n->nama_produk}}</h3>
					<h4 class="item-price">Rp{{number_format($n->harga)}}</h4>
					<div class="kategori">{{$n->kategori}}</div>
					@if ($n->stok == 0)
					<span class="badge text-bg-danger mx-0">STOK HABIS</span>
					@else
					<span class="badge text-bg-info mx-0">Stok : {{$n->stok}}</span>
					@endif	
					<br>
					<div>Resolusi : {{$n->resolusi}}</div>
					<div>Supported Device : {{$n->supportdevice}}</div>
				</figcaption>
		  </figure>
	  </div>
	</div>
	@endforeach
</div>
@endsection