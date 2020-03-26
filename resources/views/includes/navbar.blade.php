<nav class="navbar navbar-expand-lg navbar-dark b-black">

    <div class="container">
        <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navbarNavigate" aria-controls="navbarNavigate" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavigate">
            <ul class="navbar-nav mr-auto">
                <li>
                    <a class="navbar-brand text-white" href="{{ url('/') }}"><img src="{{ asset('images/app/logo.jpg') }}" class="img-responsive" width="300" title="ir a Inicio"></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('login') }}" title="Log-In"><i class="fa fa-sign-in"></i>  Ingresar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('register') }}" title="Sign-In"><i class="fa fa-user-plus"></i>  Registro</a>
                    </li>
                @else
                    @if (Request::path()!='/')
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('/admin/users') }}" title="Página de Inicio">Inicio</a>
                        </li>
                    @endif
                    @if (auth()->user()->admin)
 <!--                       <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('/admin/products/code') }}" title="Generar Código"><i class="fa fa-key"></i>&nbsp;Generar Código</a>
                        </li>
-->
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('/carts') }}" title="Pedidos">Pedidos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('/admin/categories') }}" title="Categorías">Categorías</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('/admin/products') }}" title="Productos">Productos</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-users"></i>&nbsp;Usuarios
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item text-black" href="{{ url('/admin/products/code') }}" title="Generar Código"><i class="fa fa-key"></i>&nbsp;Generar Código</a>
                                <a class="dropdown-item text-black" href="{{ url('/admin/users') }}" title="Listado de Usuarios"><i class="fa fa-list"></i>&nbsp;Listado de Usuarios</a>
                            </div>
                        </li>
                    @endif
                        @if($cant = auth()->user()->cart->details->count()>0)
                            @php $cant = auth()->user()->cart->details->count(); @endphp
                        @endif
                        @if($cant > 0 )
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('/home') }}" title="Mi Carrito de Compras tiene {{ $cant }} productos"><i class="fa fa-shopping-cart"></i>&nbsp; Carrito de compras  <span class="badge badge-pill badge-light">{{ $cant }}</span></a>
                        </li>
                        @endif
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user"></i>&nbsp;{{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                @if( auth()->user()->cart->details->count() > 0 )
                                <a class="dropdown-item text-black" href="{{ url('/home') }}" title="Mi Carrito de Compras tiene {{ $cant }} productos"><i class="fa fa-shopping-cart"></i>&nbsp; Carrito de compras <span class="badge badge-pill badge-dark">{{ $cant }}</span></a>
                                @endif
                                <a class="dropdown-item text-black" href="{{ route('logout') }}" title="Cerrar Sesión"><i class="fa fa-sign-out"></i>&nbsp; Cerrar Sesión</a>
                            </div>
                        </li>
                @endguest
            </ul>

        </div>
    </div>
</nav>
