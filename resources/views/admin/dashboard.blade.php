@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4 text-center">Panel de Administración</h1>

    <div class="row g-4">
        <!-- Pedidos -->
        <div class="col-md-4">
            <div class="card border-primary shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Pedidos</h5>
                    <p class="card-text">Administra los pedidos de los clientes.</p>
                    <a href="{{ route('admin.pedidos.index') }}" class="btn btn-primary">Ver pedidos</a>
                </div>
            </div>
        </div>

        <!-- Pedidos Especiales -->
        <div class="col-md-4">
            <div class="card border-warning shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Pedidos Especiales</h5>
                    <p class="card-text">Revisa solicitudes personalizadas de clientes.</p>
                    <a href="{{ route('admin.pedidos-especiales.index') }}" class="btn btn-warning">Ver pedidos especiales</a>
                </div>
            </div>
        </div>

        <!-- Productos -->
        <div class="col-md-4">
            <div class="card border-success shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Productos</h5>
                    <p class="card-text">Gestiona los productos de la tienda.</p>
                    <a href="{{ route('productos.index') }}" class="btn btn-success">Ver productos</a>
                </div>
            </div>
        </div>

        <!-- Categorías -->
        <div class="col-md-4">
            <div class="card border-info shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Categorías</h5>
                    <p class="card-text">Administra las categorías de productos.</p>
                    <a href="{{ route('categorias.index') }}" class="btn btn-info">Ver categorías</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
