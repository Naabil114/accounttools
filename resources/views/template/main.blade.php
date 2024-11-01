<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Account Tools</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('storage/logo/logoo.png') }}"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js">
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="{{ asset('lte/src/assets/css/styles.min.css') }}" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->

      <!-- End Sidebar scroll-->





      @include('template.menu')





    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler " id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item">
                <a class="nav-link " href="javascript:void(0)">
                  <iconify-icon icon="solar:bell-linear" class="fs-6"></iconify-icon>
                  <div class="notification bg-primary rounded-circle"></div>
                </a>
              </li>
              <!-- <a href="https://adminmart.com/product/matdash-free-bootstrap-5-admin-dashboard-template/" target="_blank"
    class="btn btn-primary">Download Free</a> -->
              <li class="nav-item dropdown">
                <a class="nav-link " href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="{{ asset('storage/user/' . Auth::user()->foto) }}" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <!-- <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
          <i class="ti ti-user fs-6"></i>
          <p class="mb-0 fs-3">My Profile</p>
        </a>
        <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
          <i class="ti ti-mail fs-6"></i>
          <p class="mb-0 fs-3">My Account</p>
        </a>
        <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
          <i class="ti ti-list-check fs-6"></i>
          <p class="mb-0 fs-3">My Task</p>
        </a> -->
                    <a data-controlsidebar-slide="true" href="{{url('logout')}}" role="button" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->

      <!-- style="background-color: antiquewhite;" -->
      @yield('content')



      <script src="{{asset('lte/src/assets/libs/jquery/dist/jquery.min.js')}}"></script>
      <script src="{{asset('lte/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('lte/src/assets/js/sidebarmenu.js')}}"></script>
      <script src="{{asset('lte/src/assets/js/app.min.js')}}"></script>
      <script src="{{asset('lte/src/assets/libs/apexcharts/dist/apexcharts.min.')}}js"></script>
      <script src="{{asset('lte/src/assets/libs/simplebar/dist/simplebar.js')}}"></script>
      <script src="{{asset('lte/src/assets/js/dashboard.js')}}"></script>
      <!-- solar icons -->
      <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
<!-- import jquery and sweetalert, sweetalert from unpg -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
      @include('sweetalert::alert')

</body>

</html>