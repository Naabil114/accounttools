@extends('template.tshop')
@section('content')

<head>
  <style>
    #komentar::-webkit-scrollbar {
      display: none;
    }
  </style>
</head>
<section id="kritik">
  <div class="container-fluid mt-5">
    <div class="row justify-content-center">

      <div class="col-md-8">
        <div class="row">

          <div class="col-md-6">

            <div class="title-element">
              <h2 class="section-title divider">Bagikan Pengalaman Anda</h2>
              <h6>Ceritakan pengalaman Anda di situs kami dengan mengisi form di bawah ini</h3>
                <form action="{{url('post')}}" method="post">
                  @csrf
                  <div class="form-group">
                    <label for="">Rating</label>
                    <select name="rating" id="rating" class="form-control">
                      <option value="">Pilih Rating</option>
                      <option value="baiksekali" data-text="Baik Sekali">⭐⭐⭐⭐⭐</option>
                      <option value="baik" data-text="Baik">⭐⭐⭐⭐</option>
                      <option value="cukup">⭐⭐⭐</option>
                      <option value="buruk">⭐⭐</option>
                      <option value="buruksekali" data-text="Buruk Sekali">⭐</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Komentar</label>
                    <textarea name="komentar" id="komentar" class="form-control"></textarea>
                  </div>
                  <input type="submit" class="btn btn-primary" value="Kirim">

                </form>
            </div>

          </div>
          <div class="col-md-6">

            <div id="komentar" class="panel-body" style="overflow-y: scroll; height: 80vh; scrollbar: hidden;">
              @foreach ($data as $d)
          <div class="card text-white bg-primary mb-3">
          <div class="card-body">
            <div class="media">
            <img src="{{ asset('storage/user/' . $d->foto) }}" width="50px" height="50px"
              style="border-radius: 50%;" class="img-circle pull-left avatar me-2" alt="Foto Profil">

            <div class="media-body">
              <p class="m-2">

              @if ($d->rating === 'baiksekali')
                <p>⭐⭐⭐⭐⭐{{ date('d-m-Y', strtotime($d->created_at)) }}</p>
              @elseif ($d->rating === 'baik')
                <p>⭐⭐⭐⭐{{ date('d-m-Y', strtotime($d->created_at)) }}</p>
              @elseif ($d->rating === 'cukup')
                <p>⭐⭐⭐{{ date('d-m-Y', strtotime($d->created_at)) }}</p>
              @elseif ($d->rating === 'buruk')
                <p>⭐⭐{{ date('d-m-Y', strtotime($d->created_at)) }}</p>
              @elseif ($d->rating === 'buruksekali')
                <p>⭐{{ date('d-m-Y', strtotime($d->created_at)) }}</p>
              @else

              @endif
              </p>
              <h5 class="badge badge-pill badge-light">{{$d->nama}}</h5>
              <p class="ms-1">{{$d->komentar}}</p>
            </div>
            </div>
          </div>
          </div>
        @endforeach
              <hr>
              {{-- <div class="btn-group">
                <button class="btn btn-default" id="btn-komentar-utama" class="lnr lnr-bubble">Komentar</button>
              </div>
              <form action="{{url('post')}}" method="post">
                @csrf
                <div class="form-group">
                  <label for="">Rating</label>
                  <select name="rating" id="rating" class="form-control">
                    <option value="">Pilih Rating</option>
                    <option value="baiksekali">Baik Sekali</option>
                    <option value="baik">Baik</option>
                    <option value="cukup">Cukup</option>
                    <option value="buruk">Buruk</option>
                    <option value="buruksekali">Buruk Sekali</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Komentar</label>
                  <textarea name="komentar" id="komentar" class="form-control"></textarea>
                </div>
                <input type="submit" class="btn btn-primary" value="Kirim">

              </form>

            </div> --}}
            <!-- <div class="subscribe-content" data-aos="fade-up">
								<p>Jika ada tutur kata yang kurang berkenan di hati anda kami mohon maaf lahir batin. Karena kami juga manusia biasa yang makan nasi juga seperti anda</p>
									<form id="form" action="" method="">
              <div class="row">
                <div class="col-lg-12">
                  <fieldset>
                    <input type="text" name="name" id="name" placeholder="Nama" autocomplete="on" required>
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Email" required="">
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <textarea name="message" id="message" placeholder="Pesan"></textarea>
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <a id="linkWa" href="https://wa.me/+6285643785183"><button type="button" class="btn btn-outline-success">Kirim Pesan</button></a>
                  </fieldset>
                </div>
              </div>
            </form>
							</div> -->

          </div>

        </div>
      </div>

    </div>
  </div>
</section>

<script>
  $(document).ready(function () {
    $('#btn-komentar-utama').click(function () {
      $('#komentar-utama').toggle();
    });
  });
</script>
@endsection