<nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur"
  data-scroll="true">
  <div class="container-fluid py-1 px-3">
    @yield('breadcrumb')
    <!-- <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
      </ol>
    </nav> -->
    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
      <div class="ms-md-auto pe-md-3 d-flex align-items-center">
      </div>
      <ul class="navbar-nav d-flex align-items-center  justify-content-end">


        <li class="nav-item d-xl-none ps-3 d-flex align-items-center me-4">
          <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </a>
        </li>
        <li class="nav-item dropdown pe-3 d-flex align-items-center">
          <a href="javascript:;" class="nav-link text-body p-0 d-flex align-items-center" id="dropdownMenuButton"
            data-bs-toggle="dropdown" aria-expanded="false">
            @php
            $avatar = asset('img/default-avatar.png');
            @endphp

            <img class="avatar avatar-sm rounded-circle me-2" style="object-fit: cover" alt="Image placeholder"
              src="{{ $avatar }}">

            <div class="d-none d-lg-block">
              <span class="mb-0 text-sm font-weight-bold d-block">Username</span>
              <div class="mb-0 text-sm" style="font-size: 12px !important">Admin</div>
            </div>
          </a>

          <ul class="dropdown-menu dropdown-menu-end " aria-labelledby="dropdownMenuButton">

            <li class="mb-2">
              <a class="dropdown-item border-radius-md" href="{{ route('auth.logout') }}">
                <div class="d-flex">
                  <div class="my-auto">
                    <i class="fas fa-sign-out-alt me-3"></i>
                  </div>
                  <div class="d-flex flex-column justify-content-center">
                    <h6 class="text-sm font-weight-normal mb-0">
                      <span class="font-weight-bold">Logout</span>
                    </h6>
                  </div>
                </div>
              </a>
            </li>
          </ul>

        </li>
      </ul>
    </div>
  </div>
</nav>