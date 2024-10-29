<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Matdash Free Bootstrap Admin Template by Adminmart</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('lte/src/assets/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('lte/src/assets/css/styles.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('lte/src/assets/css/styles.min.css') }}" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden text-bg-light min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mt-3">
              <div class="card-body">
                <a href="/" class="text-nowrap logo-img text-center d-block">
                  <img src="{{ asset('storage/logo/logoo.png') }}" alt="Image   Not Found" style="width: 95px; height: 95px">
                </a>
                <p class="text-center">Your Account Choice</p>
                <form method="post" action="{{ url('signupproses') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-2">
                    <label for="nik" class="form-label">NIK</label>
                    <input required type="number" min="0" max="9999999999999999" class="form-control" id="nik" name="nik" aria-describedby="nikHelp" autofocus>
                  </div>
                  <div class="mb-2">
                    <label for="nama" class="form-label">Nama</label>
                    <input required type="text" class="form-control" id="nama" name="nama" aria-describedby="namaHelp">
                  </div>
                  <div class="mb-2">
                    <label for="email" class="form-label">Email</label>
                    <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-2">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input required type="text" class="form-control" id="alamat" name="alamat" aria-describedby="alamatHelp">
                  </div>
                  <div class="mb-2">
                    <label for="tlp" class="form-label">No Hp</label>
                    <input required type="number" class="form-control" id="tlp" name="tlp" aria-describedby="tlpHelp">
                  </div>
                  
                  <div class="mb-2">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                      <input required type="password" class="form-control" id="password" name="password">
                      <span class="input-group-text">
                        <i class="fas fa-eye" id="show_password"></i>
                        <i class="fas fa-eye-slash d-none" id="hide_password"></i>
                      </span>
                    </div>
                  </div>
                  <div class="mb-4">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <div class="input-group">
                      <input required type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                      <span class="input-group-text">
                        <i class="fas fa-eye" id="show_password2"></i>
                        <i class="fas fa-eye-slash d-none" id="hide_password2"></i>
                      </span>
                    </div>
                  </div>
                  <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Daftar</button>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Sudah Punya Akun?</p>
                    <a class="text-primary fw-bold ms-2" href="/">Sign In</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- solar icons -->
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
  <script>
    document.getElementById('show_password').addEventListener('click', function() {
      var pwdField = document.getElementById('password');
      pwdField.type = 'text';
      document.getElementById('show_password').classList.add('d-none');
      document.getElementById('hide_password').classList.remove('d-none');
    });

    document.getElementById('hide_password').addEventListener('click', function() {
      var pwdField = document.getElementById('password');
      pwdField.type = 'password';
      document.getElementById('hide_password').classList.add('d-none');
      document.getElementById('show_password').classList.remove('d-none');
    });
  </script>
  <script>
    document.getElementById('show_password2').addEventListener('click', function() {
      var pwdField = document.getElementById('password_confirmation');
      pwdField.type = 'text';
      document.getElementById('show_password2').classList.add('d-none');
      document.getElementById('hide_password2').classList.remove('d-none');
    });

    document.getElementById('hide_password2').addEventListener('click', function() {
      var pwdField = document.getElementById('password_confirmation');
      pwdField.type = 'password';
      document.getElementById('hide_password2').classList.add('d-none');
      document.getElementById('show_password2').classList.remove('d-none');
    });
  </script>
  @include('sweetalert::alert')
</body>

</html>