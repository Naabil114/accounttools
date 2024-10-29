@extends('template.main')
@section('content')


<div class="body-wrapper-inner">

  <div class="card bg-transparent">
    <div class="card-body">

      <a href="{{url('inputproduk')}}" type="button">
        <div class="col-1 mb-3">
          <div class="input-group">
            <span class="input-group-text" style="background-color: #22223b">
              <iconify-icon icon="solar:clapperboard-edit-linear" class="text-light" width="20"></iconify-icon>
              <span class="text-light ms-2">TAMBAH</span>
            </span>
          </div>
        </div>
      </a>


      <table class="table table-bordered" style="margin-left: -10px;">
        <thead class="table-dark">
          <tr>
            <th> No </th>
            <th> Foto </th>
            <th> Email </th>
            <th> Password </th>
            <th>Kategori</th>
            <th> Nama Produk </th>
            <th> Harga </th>
            <th> Stok </th>
            <th> Kategori </th>
            <th> Deskripsi </th>
            <th> Diskon </th>
            <th> Harga Akhir </th>
            <th> Action </th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $d => $item)
          
          @if ($item->id_kategori === 1)
          <tr class="table-danger">
            @elseif($item->id_kategori === 2)
          <tr class="table-warning">
            @elseif($item->id_kategori === 4)
          <tr class="table-success">
            @elseif($item->id_kategori === 3)
          <tr class="table-info">
            @else
          <tr class="table-primary">
            @endif
            <td> {{ $d+1 }} </td>
            <td>
              <img src="{{ asset('storage/produk/' . $item->foto) }}" width="35" height="35">
            </td>
            <td class="text-dark"> {{$item->email}} </td>
            <td class="text-dark"> {{$item->password}} </td>
            <td class="text-dark">{{$item->kategoriakun->nama}}</td>
            <td class="text-dark"> {{$item->nama_produk}} </td>
            <td class="text-dark"> {{$item->harga}} </td>
            <td class="text-dark"> {{$item->stok}} </td>
            <td class="text-dark"> {{$item->kategori}} </td>
            <td class="text-dark"> {{$item->deskripsi}} </td>
            <td class="text-dark"> {{$item->diskon}} </td>
            <td class="text-dark"> {{$item->harga_akhir}} </td>
            <td>
              <div class="d-flex justify-content-around">
                <a href="{{url('editproduk/' . $item->id_produk . '/edit')}}">
                  <button type="button" class="btn">
                    <iconify-icon icon="solar:clapperboard-edit-linear" class="text-black" width="20" style="margin-left: -25px;"></iconify-icon>
                  </button>
                </a>

                <form method="POST" action="{{url('deleteproduk/' . $item->id_produk) }}" class="d-inline">
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="btn">
                    <iconify-icon icon="solar:trash-bin-2-broken" class="text-black" width="20" style="margin-left: -25px;"></iconify-icon>
                  </button>
                </form>
              </div>

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <script>
    $('.show-confirm').click(function(event) {
      var form = $(this).closest("form");
      var name = $(this).data("name");
      event.preventDefault();
      swal({
          title: `Apakah Anda Yakin Untuk Menghapus Produk Ini?`,
          // text: "If you delete this, it will be gone forever.",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            form.submit();
          }
        });
    });
  </script>

  @endsection