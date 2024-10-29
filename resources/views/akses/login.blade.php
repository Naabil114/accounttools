<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Account Tools</title>
  <link rel="shortcut icon" type="image/png" href="{{asset('lte/src/assets/images/logos/favicon.png')}}" />
  <link rel="stylesheet" href="{{asset('lte/src/assets/css/styles.min.css')}}" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden text-bg-light min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <div href="/" class="text-nowrap logo-img text-center d-block w-80">
                  <img src="{{ asset('storage/logo/logoo.png') }}" alt="Image   Not Found" style="width: 95px; height: 95px">
                </div>
                <p class="text-center">Your Account Choice</p>
                <form method="post" action="{{url('loginproses')}}">
                  @csrf
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Masukkan email" autofocus required>  
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <div class="input-group">
                      <input type="password" name="password" class="form-control" id="pwd" placeholder="Masukkan password" required>
                      <span class="input-group-text">
                        <i class="fas fa-eye" id="show_password"></i>
                        <i class="fas fa-eye-slash d-none" id="hide_password"></i>
                      </span>
                    </div>
                  </div>
                  <!-- <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                      <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                      <label class="form-check-label text-dark" for="flexCheckChecked">
                        Remeber this Device
                      </label>
                    </div>
                    <a class="text-primary fw-bold" href="./index.html">Forgot Password ?</a>
                  </div> -->
                  <!-- <a href="./index.html" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</a> -->
                  <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Login <iconify-icon icon="solar:login-2-bold"></iconify-icon></button>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Anda Anak Baru?</p>
                    <a class="text-primary fw-bold ms-2" href="{{ url('signup') }}">Create An Account</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
  <script src="{{ asset('lte/src/assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('lte/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <!-- solar icons -->
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
  <script>
    document.getElementById('show_password').addEventListener('click', function() {
      var pwdField = document.getElementById('pwd');
      pwdField.type = 'text';
      document.getElementById('show_password').classList.add('d-none');
      document.getElementById('hide_password').classList.remove('d-none');
    });

    document.getElementById('hide_password').addEventListener('click', function() {
      var pwdField = document.getElementById('pwd');
      pwdField.type = 'password';
      document.getElementById('hide_password').classList.add('d-none');
      document.getElementById('show_password').classList.remove('d-none');
    });
  </script>
</body>
@include('sweetalert::alert')

</html>