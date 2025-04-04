@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4 text-center display-4 fw-bold text-brown" style="font-family: 'Playfair Display', serif; letter-spacing: 2px;">
        🎂 Nuestros Deliciosos Productos 🎂
    </h1>

    <div class="mb-5 text-center">
        <div class="d-flex flex-wrap justify-content-center gap-2">
            <a href="{{ route('productos.publicos') }}"
               class="btn btn-pastel {{ !$categoria_id ? 'active' : '' }}">
                Todos
            </a>
            @foreach ($categorias as $cat)
                <a href="{{ route('productos.publicos', ['categoria' => $cat->id]) }}"
                   class="btn btn-pastel {{ $categoria_id == $cat->id ? 'active' : '' }}">
                    🍰 {{ $cat->nombre }}
                </a>
            @endforeach
        </div>
    </div>

    <div class="row g-4">
        @forelse ($productos as $producto)
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 shadow-lg-hover border-0 transition-all"
                 style="border-radius: 20px; background: #fff5f5; transition: 0.3s all ease;">
                @if($producto->imagen)
                <div class="position-relative" style="padding-top: 100%;">
                    <img src="{{ asset('storage/' . $producto->imagen) }}"
                         class="card-img-top position-absolute top-0 start-0 w-100 h-100 p-3"
                         style="object-fit: contain; border-radius: 20px 20px 0 0;">
                </div>
                @endif
                <div class="card-body d-flex flex-column text-center">
                    <h5 class="card-title fw-bold text-brown mb-3">{{ $producto->nombre }}</h5>
                    <p class="card-text text-muted mb-2 px-2" style="font-size: 0.9rem;">
                        {{ Str::limit($producto->descripcion, 80) }}
                    </p>
                    <p class="fw-bold mb-3 text-success fs-4">${{ number_format($producto->precio, 2) }}</p>

                    <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST" class="mt-auto">
                        @csrf
                        <button type="submit" class="btn btn-pastel-primary w-100 py-2">
                            🛒 Agregar al carrito
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
            <div class="col-12 text-center py-5">
                <div class="alert alert-warning" style="background: #fff3cd; border-radius: 15px;">
                    <i class="bi bi-info-circle me-2"></i>
                    Próximamente más delicias...
                </div>
            </div>
        @endforelse
    </div>
</div>

<style>
    .text-brown { color: #6d4c41; }
    .btn-pastel {
        background: #fff0f0;
        border: 2px solid #ffd1d1;
        color: #6d4c41;
        border-radius: 15px;
        transition: 0.3s all ease;
    }
    .btn-pastel:hover {
        background: #ffd1d1;
        transform: translateY(-2px);
    }
    .btn-pastel.active {
        background: #ffb3b3 !important;
        border-color: #ff9494 !important;
    }
    .btn-pastel-primary {
        background: #ffb3b3;
        color: white;
        border: none;
        border-radius: 15px;
        transition: 0.3s all ease;
    }
    .btn-pastel-primary:hover {
        background: #ff9494;
        transform: translateY(-2px);
    }
    .shadow-lg-hover {
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    }
    .shadow-lg-hover:hover {
        box-shadow: 0 10px 25px rgba(0,0,0,0.12);
        transform: translateY(-5px);
    }
</style>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
@endsection
