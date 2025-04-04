<nav class="navbar navbar-expand-lg navbar-pastel shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}" style="font-family: 'Playfair Display', serif;">
      <img src="/logo/logo.png" alt="Logo Pastelería" width="40" class="me-2">
      <span class="fw-bold text-brown fs-3">Pastelería</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item mx-2">
          <a class="nav-link nav-link-pastel" href="{{ route('productos.publicos') }}">🍰 Productos</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link nav-link-pastel" href="{{ route('pedido.especial.create') }}">🎁 Pedido Especial</a>
        </li>

        @auth
            @if(auth()->user()->role === 'admin')
                <li class="nav-item dropdown mx-2">
                    <a class="nav-link nav-link-pastel dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        👑 Admin
                    </a>
                    <ul class="dropdown-menu dropdown-pastel">
                        <li><a class="dropdown-item dropdown-item-pastel" href="{{ route('admin.dashboard') }}">Panel de Administracion</a></li>
                        <li><a class="dropdown-item dropdown-item-pastel" href="{{ route('categorias.index') }}">Categorías</a></li>
                        <li><a class="dropdown-item dropdown-item-pastel" href="{{ route('productos.index') }}">Productos</a></li>
                        <li><a class="dropdown-item dropdown-item-pastel" href="{{ route('admin.pedidos.index') }}">Pedidos</a></li>
                        <li><a class="dropdown-item dropdown-item-pastel" href="{{ route('admin.pedidos-especiales.index') }}">Pedidos Especiales</a></li>
                    </ul>
                </li>
            @endif
        @endauth
      </ul>

      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item me-3">
          <a class="nav-link py-2" href="{{ route('carrito.index') }}">
            <i class="bi bi-cart fs-3 text-brown"></i>
            <span class="visually-hidden">Carrito</span>
          </a>
        </li>
        
        @auth
            <li class="nav-item mx-2">
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-pastel-logout">
                        👋 Cerrar sesión
                    </button>
                </form>
            </li>
        @else
            <li class="nav-item mx-2">
                <a class="btn btn-pastel-auth" href="{{ route('login') }}">
                    🔑 Iniciar sesión
                </a>
            </li>
            <li class="nav-item mx-2">
                <a class="btn btn-pastel-auth" href="{{ route('register') }}">
                    ✍️ Registrarse
                </a>
            </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>

<style>
    .navbar-pastel {
        background: #fff5f5 !important;
        border-bottom: 2px solid #ffd1d1 !important;
    }
    
    .text-brown { color: #6d4c41; }
    
    .nav-link-pastel {
        color: #6d4c41 !important;
        border-radius: 15px;
        padding: 8px 15px !important;
        transition: all 0.3s ease;
    }
    
    .nav-link-pastel:hover {
        background: #ffd1d1 !important;
        transform: translateY(-2px);
    }
    
    .dropdown-pastel {
        border: 2px solid #ffd1d1;
        border-radius: 15px;
        background: #fff0f0;
    }
    
    .dropdown-item-pastel {
        color: #6d4c41;
        transition: all 0.2s ease;
    }
    
    .dropdown-item-pastel:hover {
        background: #ffd1d1;
        border-radius: 10px;
    }
    
    .btn-pastel-logout {
        background: #ffb3b3;
        color: white;
        border: none;
        border-radius: 15px;
        padding: 8px 20px;
        transition: all 0.3s ease;
    }
    
    .btn-pastel-logout:hover {
        background: #ff9494;
        transform: translateY(-2px);
    }
    
    .btn-pastel-auth {
        background: #fff0f0;
        color: #6d4c41;
        border: 2px solid #ffd1d1;
        border-radius: 15px;
        padding: 8px 20px;
        transition: all 0.3s ease;
    }
    
    .btn-pastel-auth:hover {
        background: #ffd1d1;
        transform: translateY(-2px);
    }
</style>

<!-- Agregar en tu layout principal -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">