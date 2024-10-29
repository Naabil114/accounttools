<div>
  <!-- Sidebar navigation-->
  <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
    <ul id="sidebarnav">
      <li class="nav-small-cap">
        <a href="/dashboard" class="text-nowrap logo-img text-center d-block">
          <img src="{{ asset('storage/logo/logoo.png') }}" alt="Image Not Found" style="width: 65px; height: 65px">
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link {{ Request::path() === 'dashboard' ? 'active' : '';}}" href="{{url('dashboard')}}" aria-expanded="false">
          <iconify-icon icon="cuida:dashboard-outline"></iconify-icon>
          <span class="hide-menu">Dashboard</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link {{ Request::path() === 'produk' || Request::path() === 'inputproduk' || Request::path() === 'editproduk' ? 'active' : '';}}" href="{{url('produk')}}" aria-expanded="false">
          <iconify-icon icon="carbon:ibm-data-product-exchange"></iconify-icon>
          <span class="hide-menu">Produk</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link {{ Request::path() === 'laporan' ? 'active' : '';}}" href="{{url('laporan')}}" aria-expanded="false">
          <iconify-icon icon="solar:file-broken"></iconify-icon>
          <span class="hide-menu">Laporan</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link {{ Request::path() === 'transaksi' ? 'active' : '';}}" href="{{url('transaksi')}}" aria-expanded="false">
          <iconify-icon icon="solar:chat-round-money-outline"></iconify-icon>
          <span class="hide-menu">Transaksi</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link {{ Request::path() === 'akun' || Request::path() === 'inputakun' ? 'active' : '';}}" href="{{url('akun')}}" aria-expanded="false">
          <!-- <iconify-icon icon="solar:accessibility-broken"></iconify-icon> -->
          <!-- <iconify-icon icon="solar:user-speak-bold-duotone"></iconify-icon> -->
          <iconify-icon icon="solar:meditation-round-broken"></iconify-icon>
          <span class="hide-menu">Akun Admin</span>

        </a>
      </li>
      <li class="sidebar-item" >
        <a class="sidebar-link {{ Request::path() === 'akunpelanggan' ? 'active' : '';}}" href="{{url('akunpelanggan')}}" aria-expanded="false">
          <!-- <iconify-icon icon="solar:accessibility-broken"></iconify-icon> -->
          <iconify-icon icon="solar:user-hand-up-broken"></iconify-icon>
          <span class="hide-menu">Akun Pelanggan</span>
        </a>
      </li>

      <li class="sidebar-item">
        <a class="sidebar-link {{ Request::path() === 'kategori' || Request::path() === 'kategori' ? 'active' : '';}}" href="{{url('kategori')}}" aria-expanded="false">
        <!-- <iconify-icon icon="solar:card-send-bold"></iconify-icon> -->
        <!-- <iconify-icon icon="solar:swimming-broken"></iconify-icon> -->
        <iconify-icon icon="solar:stretching-broken"></iconify-icon>
          <span class="hide-menu">Kategori Produk</span>

        </a>
      </li>
  </nav>
  <!-- End Sidebar navigation -->
</div>