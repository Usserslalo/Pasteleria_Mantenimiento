@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center py-5">
    <div class="card shadow-lg border-0 w-100" style="max-width: 550px; border-radius: 20px; background-color: #fff5f5;">
        <div class="card-body p-4">
            <h2 class="text-center mb-4 text-brown" style="font-family: 'Playfair Display', serif;">
                🍓 Crear Cuenta
            </h2>

            {{-- ✅ Mostrar errores de validación --}}
            @if ($errors->any())
                <div class="alert alert-danger text-start rounded-3 py-3 px-4">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>⚠️ {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label text-brown">Nombre completo</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control pastel-input" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label text-brown">Correo electrónico</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control pastel-input" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label text-brown">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control pastel-input" required>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label text-brown">Confirmar contraseña</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control pastel-input" required>
                </div>

                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-pastel-primary py-2">Registrarse</button>
                </div>

                <div class="text-center">
                    <a href="{{ route('login') }}" class="text-decoration-none text-muted">¿Ya tienes una cuenta? Inicia sesión</a>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Estilos pastel --}}
<style>
    .text-brown {
        color: #6d4c41;
    }

    .btn-pastel-primary {
        background: #ffb3b3;
        color: white;
        border: none;
        border-radius: 15px;
        transition: 0.3s ease;
    }

    .btn-pastel-primary:hover {
        background: #ff9494;
        transform: translateY(-2px);
    }

    .pastel-input {
        border-radius: 12px;
        border: 2px solid #ffd1d1;
        background-color: #fffafa;
        transition: 0.2s;
    }

    .pastel-input:focus {
        border-color: #ff9494;
        box-shadow: 0 0 0 0.2rem rgba(255, 148, 148, 0.25);
    }

    @media (max-width: 576px) {
        .card-body {
            padding: 1.5rem;
        }
    }
</style>

<!-- Fuente personalizada -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
@endsection
