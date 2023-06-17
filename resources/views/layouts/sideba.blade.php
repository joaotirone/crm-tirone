<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Side Bar</title>
              <!-- link css -->
  <link rel="stylesheet" href="css/style.css">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
              <!-- link boxinco -->   
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <!-- CSS do Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    .custom-dropdown-menu::after {
    display: none;
}
</style>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
  <nav class="sidebar close">
    <header>
      <div class="image-text">
          <span class="image">
              <img src="{{ asset('img/logo2.png') }}" alt="logo" />
          </span>
          <div class="text header-text">
              <span class="name">{{Auth::User()->user_name}}</span>
              <span class="profession"></span>
          </div>
      </div>

      <i class='bx bx-chevron-right toggle'></i>
    </header>
      <div class="menu-bar">
        <div class="menu">
          <ul class="menu-links">

          </ul>
          <ul class="menu-links">
            <li class="nav-link">
               <a href="{{route('home.page')}}">
                <i class='bx bx-home-alt icon' ></i>
                <span class="text nav-text">Dashborad</span>
               </a>
            </li>
          </ul>
          @if(auth()->user()->can('vendas'))
          <ul class="menu-links">
              <li class="nav-link">
                  <a class="" href="#"  data-toggle="dropdown">
                  <i class='bx bx-cart-alt icon'></i>
                  <span class="text nav-text">Vendas</span>
                  </a>
                  <ul class="dropdown-menu menu-links" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="{{route('input.index')}}">Visualizar  Cadastro</a></li>
                      <li><a class="dropdown-item" href="{{route('input.create')}}">Cadastrar Pedido</a></li>
                  </ul>
              </li>
          </ul>
          @endif 
          @if(auth()->user()->can('pos-vendas')) 
          <ul class="menu-links">
            <li class="nav-link">
               <a href="#">
               <i class='bx bx-bar-chart-alt-2 icon'></i>
                <span class="text nav-text">Pos Venda</span>
               </a>
            </li>
          </ul>
          @endif 
          @if(auth()->user()->can('config_administrativa')) 
          <ul class="menu-links">
              <li class="nav-link">
                  <a class="" href="#"  data-toggle="dropdown">
                  <i class='bx bx-cog icon'></i>  
                  <span class="text nav-text">Administração</span>
                  </a>
                  <ul class="dropdown-menu menu-links" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="{{route('net.index')}}">Internet </a></li>
                      <li><a class="dropdown-item" href="{{route('fixo.index')}}">Fixo</a></li>
                      <li><a class="dropdown-item" href="{{route('cell.index')}}">Plano Movel</a></li>
                      <li><a class="dropdown-item" href="{{route('tv.index')}}">Grade de canais</a></li>
                      @if(auth()->user()->can('config_adm_user')) 
                      <li><a class="dropdown-item" href="{{route('user.index')}}">Usuarios</a></li>
                      @endif 
                  </ul>
              </li>
          </ul>
          @endif  
        </div>
        <div class="bottom-content">
            <li class="">
               <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class='bx bx-log-out icon' ></i>
                <span class="text nav-text">Logout</span>
               </a>
            </li>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
            <li class="mode">
               <div class="moon-sun">
                  <i class='bx bx-moon icon moon' ></i>
                  <i class='bx bx-sun icon sun' ></i>
               </div>
               <span class="mode-text text">Dark Mode</span>

               <div class="toggle-switch">
                  <span class="switch"></span>
               </div>
            </li>
        </div>
      </div>
  </nav>

  <section class="home">
    @yield('body')
  </section>

  <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>