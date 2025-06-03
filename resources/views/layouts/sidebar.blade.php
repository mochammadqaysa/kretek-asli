<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand d-flex justify-content-center align-items-center px-4 py-3 m-0" href="">
        <img src="{{asset('img/logo-kretek.png')}}" class="navbar-brand-img" style="width: auto; height: auto;" alt="main_logo">
      </a>

    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        @php
        use App\Helpers\Menu;
        use App\Helpers\AuthCommon;
        $menu = '';
        // $role = session('role_permit');
        $permission = session('slug_permit');

        $obj_menu = new Menu();
        $obj_menu->setPermission($permission);
        $obj_menu->init()
        ->start_group()
        ->item('Dashboard', 'fas fa-chart-area', 'app/dashboard', Request::is('app/dashboard'), "dashboard.view")
        ->item('Janji Temu', 'fas fa-clipboard-list', 'app/appointment', Request::is('app/appointment'), "dashboard.view")
        ->item('Atur Jadwal', 'fas fa-calendar-day', 'app/schedule', Request::is('app/schedule'), "dashboard.view")
        ->end_group();

        $obj_menu->title('Manajemen User', 'dashboard.view');
        $obj_menu->start_group()
        ->item('Module', 'fas fa-chart-area', 'app/module', Request::is('app/module'), "dashboard.view")
        ->item('Role', 'fas fa-clipboard-list', 'app/role', Request::is('app/role'), "dashboard.view")
        ->item('User', 'fas fa-calendar-day', 'app/user', Request::is('app/user'), "dashboard.view")
        ->end_group();

        $menu = $obj_menu->to_html();
        @endphp
        {!! $menu !!}
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn btn-outline-dark mt-4 w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard?ref=sidebarfree" type="button">Documentation</a>
        <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a>
      </div>
    </div>
  </aside>