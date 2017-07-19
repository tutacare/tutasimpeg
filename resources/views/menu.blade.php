<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">TutaSIMPEG</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        @if (Auth::check())
          <li><a href="{{ url('/') }}">Dashboard</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Master <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="{{ url('/kartu-induk-pegawai') }}">Kartu Induk Pegawai</a></li>
            </ul>
          </li>
          <li><a href="{{ url('/statistik') }}">Statistik</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Peralatan <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="{{ url('/import-file') }}">Import File</a></li>
              <li><a href="{{ url('/export-file') }}">Export File</a></li>
            </ul>
          </li>
        @endif
      </ul>

      <ul class="nav navbar-nav navbar-right">
        @if (Auth::guest())
          <li><a href="{{ url('/auth/login') }}">Login</a></li>
        @else
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="{{ url('/tutapos-settings') }}">{{trans('menu.application_settings')}}</a></li>
              <li class="divider"></li>
              <li><a href="{{ url('/auth/logout') }}">{{trans('menu.logout')}}</a></li>
            </ul>
          </li>
        @endif
      </ul>
    </div>
  </div>
</nav>
