@extends('template.tshop')
@section('content')


  <div class="container-fluid mt-5">
    <div class="card align-center shadow" style="width:20rem;">
      <div class="card-body">
        <div class="card-header"><h3 class="card-title">Pembayaran</h3></div>
      </div>
        <div class="card-body">

          <ul class="list-group list-group-flush">
              <li class="list-group-item">ID Transaksi: {{$data->id_transaksi}}</li>
              <li class="list-group-item">Nama: {{$data->user->nama}}</li>
              <li class="list-group-item">Bayar: Rp.{{ number_format($data->total )}}</li>
          </ul>
          <div class="card-body " >
          <div class="p-2">
            <button  type="button"class="btn btn-success" id="pay-button">Bayar Sekarang</button>
        </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            window.snap.pay('{{$token}}', {
                onSuccess: function(result) {
                    alert("payment success!");
                    console.log(result);
                    a = $.post('http://127.0.0.1:8000/callback', {result:result});
                    console.log(a);
                    window.location.href = "{{ url('selesai') }}";
                },
                onPending: function(result) {
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    alert("payment failed!");
                    console.log(result);
                    window.location.href = "{{ url('trans') }}";
                },
                onClose: function() {
                    alert('you closed the popup without finishing the payment');
                    window.location.href = "{{ url('trans') }}";
                }
            })
        });

        
        
    </script>

@endsection