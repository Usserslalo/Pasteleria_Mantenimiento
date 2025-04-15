@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4 text-center display-4 fw-bold text-brown" style="font-family: 'Playfair Display', serif; letter-spacing: 2px;">
        Panel de Administración
    </h1>

    <div class="row g-4">
        <!-- Pedidos -->
        <div class="col-md-4">
            <div class="card h-100 shadow-lg-hover border-0 transition-all" 
                 style="border-radius: 20px; background: #fff5f5; transition: 0.3s all ease;">
                <div class="card-body text-center d-flex flex-column">
                    <h5 class="card-title fw-bold text-brown mb-3">Gestionar Pedidos</h5>
                    <p class="card-text text-muted mb-2 px-2">Administra los pedidos de los clientes.</p>
                    <a href="{{ route('admin.pedidos.index') }}" 
                       class="btn btn-pastel-primary mt-auto py-2">
                        Ver pedidos
                    </a>
                </div>
            </div>
        </div>

        <!-- Pedidos Especiales -->
        <div class="col-md-4">
            <div class="card h-100 shadow-lg-hover border-0 transition-all" 
                 style="border-radius: 20px; background: #fff5f5; transition: 0.3s all ease;">
                <div class="card-body text-center d-flex flex-column">
                    <h5 class="card-title fw-bold text-brown mb-3">Gestionar Pedidos Especiales</h5>
                    <p class="card-text text-muted mb-2 px-2">Revisa solicitudes personalizadas de clientes.</p>
                    <a href="{{ route('admin.pedidos-especiales.index') }}" 
                       class="btn btn-pastel-warning mt-auto py-2">
                        Ver pedidos especiales
                    </a>
                </div>
            </div>
        </div>

        <!-- Productos -->
        <div class="col-md-4">
            <div class="card h-100 shadow-lg-hover border-0 transition-all" 
                 style="border-radius: 20px; background: #fff5f5; transition: 0.3s all ease;">
                <div class="card-body text-center d-flex flex-column">
                    <h5 class="card-title fw-bold text-brown mb-3">Crear Productos</h5>
                    <p class="card-text text-muted mb-2 px-2">Gestiona los productos de la tienda.</p>
                    <a href="{{ route('productos.index') }}" 
                       class="btn btn-pastel-success mt-auto py-2">
                        Ver productos
                    </a>
                </div>
            </div>
        </div>

        <!-- Categorías -->
        <div class="col-md-4">
            <div class="card h-100 shadow-lg-hover border-0 transition-all" 
                 style="border-radius: 20px; background: #fff5f5; transition: 0.3s all ease;">
                <div class="card-body text-center d-flex flex-column">
                    <h5 class="card-title fw-bold text-brown mb-3">Crear Categorías</h5>
                    <p class="card-text text-muted mb-2 px-2">Administra las categorías de productos.</p>
                    <a href="{{ route('categorias.index') }}" 
                       class="btn btn-pastel-info mt-auto py-2">
                        Ver categorías
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .text-brown { color: #6d4c41; }
    
    .btn-pastel-primary {
        background: #ffb3b3;
        color: white;
        border: none;
        border-radius: 15px;
        transition: 0.3s all ease;
    }
    
    .btn-pastel-warning {
        background: #ffe699;
        color: #6d4c41;
        border: none;
        border-radius: 15px;
        transition: 0.3s all ease;
    }
    
    .btn-pastel-success {
        background: #b3ffc6;
        color: #6d4c41;
        border: none;
        border-radius: 15px;
        transition: 0.3s all ease;
    }
    
    .btn-pastel-info {
        background: #b3e0ff;
        color: #6d4c41;
        border: none;
        border-radius: 15px;
        transition: 0.3s all ease;
    }
    
    .btn-pastel-primary:hover,
    .btn-pastel-warning:hover,
    .btn-pastel-success:hover,
    .btn-pastel-info:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .btn-pastel-primary:hover { background: #ff9494; }
    .btn-pastel-warning:hover { background: #ffd699; }
    .btn-pastel-success:hover { background: #9bffb3; }
    .btn-pastel-info:hover { background: #99ccff; }
    
    .shadow-lg-hover {
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    }
    
    .shadow-lg-hover:hover {
        box-shadow: 0 10px 25px rgba(0,0,0,0.12);
        transform: translateY(-5px);
    }
</style>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet>
@endsection