@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center py-5">
    <div class="card shadow-lg border-0 w-100" style="max-width: 480px; border-radius: 20px; background-color: #fff5f5;">
        <div class="card-body p-4">
            <h2 class="text-center mb-4 text-brown" style="font-family: 'Playfair Display', serif;">
                🍪 Iniciar Sesión
            </h2>

            @if(session('status'))
                <div class="alert alert-success text-center">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label text-brown">Correo electrónico</label>
                    <input type="email" name="email" id="email" class="form-control pastel-input" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label text-brown">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control pastel-input" required>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" name="remember" id="remember" class="form-check-input">
                    <label class="form-check-label text-muted" for="remember">Recuérdame</label>
                </div>

                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-pastel-primary py-2">Ingresar</button>
                </div>

                <div class="text-center">
                    <a href="{{ route('password.request') }}" class="text-decoration-none text-muted">
                        ¿Olvidaste tu contraseña?
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Estilos personalizados --}}
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
</style>

<!-- Fuente personalizada -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
@endsection
