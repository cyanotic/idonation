<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
  <ul class="navbar-nav navbar-right">
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
      @if ( Auth::user()->foto == 'default.jpg' )
      <img alt="image" src="{{ asset('assets/img/daftar-donasi/'.Auth::user()->foto) }}" class="rounded-circle mr-1">
      @else
      <img alt="image" src="{{ asset('storage/'.Auth::user()->foto) }}" class="rounded-circle mr-1">
      @endif
      <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div></a>
      <div class="dropdown-menu dropdown-menu-right">
        <a href="/user/profiel" class="dropdown-item has-icon">
          <i class="far fa-user"></i> Profile
        </a>
        <a href="/user/setting" class="dropdown-item has-icon">
          <i class="fas fa-cog"></i> Settings
        </a>
        <div class="dropdown-divider"></div>
        <a href="/logout" class="dropdown-item has-icon text-danger">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      </div>
    </li>
  </ul>
</nav>