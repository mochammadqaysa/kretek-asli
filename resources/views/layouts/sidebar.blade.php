<style>
  
</style>
<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">

  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header d-flex align-items-center">
      <a class="navbar-brand text-center">
        @php
        $logo = asset('img/logo.png');
        $title = 'Kretek Asli';
        $block = '';

        @endphp
        <img src="{{ $logo }}" style="max-height: 5rem !important; width: 10rem;"> 
        
      </a>
      <div class="ml-auto">
        <!-- Sidenav toggler -->
        <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
          <div class="sidenav-toggler-inner">
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar-inner">
      @php
      use App\Helpers\Menu;
      use App\Helpers\AuthCommon;
      $menu = '';
      // $role = session('role_permit');
      $permission = session('slug_permit');

      // dd($permission);

      $obj_menu = new Menu();
      $obj_menu->setPermission($permission);
      $obj_menu->init()
      ->start_group()
      ->item('Dashboard', 'fas fa-chart-area', 'app/dashboard', Request::is('app/dashboard'), "dashboard.view")
      ->item('Layanan', 'fas fa-hands-helping', 'app/service', Request::is('app/service'), "dashboard.view")
      ->item('Janji Temu', 'fas fa-clipboard-list', 'app/appointment', Request::is('app/appointment'), "dashboard.view")
      ->item('Atur Jadwal', 'fas fa-calendar-day', 'app/schedule_setting', Request::is('app/schedule_setting'), "dashboard.view")
      ->end_group();

      

      $obj_menu->start_group()
      ->start_accordion()
      ->sub_item_accordion('Manajemen User','user-management',["module.list", "role.list", "user.list"], 'ni ni-badge')
      ->start_item_accordion('user-management', (
        Request::is('app/module') ||
      Request::is('app/user') ||
      Request::is('app/role') ||
      Request::is('app/permission') ||
      Request::is('app/role/permission/*')
      ))
      ->item('Manage Module', 'fas fa-project-diagram', 'app/module', (Request::is('app/module') || Request::is('app/permission')) , "module.list")
      ->item('Manage Role', 'fas fa-user-astronaut', 'app/role', (Request::is('app/role') || Request::is('app/role/permission/*')), "role.list")
      ->item('Manage User', 'ni ni-circle-08', 'app/user', Request::is('app/user'), "user.list")
      ->end_item_accordion()
      ->end_accordion()
      ->end_group();



      $menu = $obj_menu->to_html();
      @endphp
      {!! $menu !!}
    </div>
  </div>
</nav>