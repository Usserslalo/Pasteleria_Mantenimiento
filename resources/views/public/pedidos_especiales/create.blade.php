@extends('layouts.app')

@section('content')
<div class="py-5 px-3 px-md-4">
    <div class="special-order-wrapper">

        <!-- Encabezado -->
        <div class="hero-section text-center mb-5">
            <h1 class="display-4 fw-bold text-brown" style="font-family: 'Playfair Display', serif;">
                🎂 Diseña tu Pastel Soñado
            </h1>
            <p class="lead text-muted mx-auto" style="max-width: 600px;">
                ¡Crea una obra maestra única con nuestros expertos reposteros!
            </p>
        </div>

        @if(session('success'))
            <div class="alert alert-success text-center mb-4 rounded-pill py-3" style="background-color: #d4edda; color: #155724;">
                🎉 {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('pedido.especial.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-grid">
                <!-- Datos personales -->
                <div class="form-card">
                    <div class="form-card-header">
                        <h2 class="text-brown">👤 Tus Datos</h2>
                        <div class="decorative-line"></div>
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="form-label">Nombre completo</label>
                        <input type="text" name="nombre" class="form-input" required>
                        <div class="input-icon">✍️</div>
                    </div>

                    <div class="form-group">
                        <label for="contacto" class="form-label">Contacto</label>
                        <input type="text" name="contacto" class="form-input" placeholder="Teléfono o correo electrónico" required>
                        <div class="input-icon">📱</div>
                    </div>
                </div>

                <!-- Detalles creativos -->
                <div class="form-card">
                    <div class="form-card-header">
                        <h2 class="text-brown">🎨 Detalles Creativos</h2>
                        <div class="decorative-line"></div>
                    </div>

                    <div class="form-group">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea name="descripcion" rows="5" class="form-input" placeholder="Ej: Pastel de 3 pisos, sabor vainilla con frambuesa..." required></textarea>
                        <div class="input-icon">📝</div>
                    </div>

                    <div class="form-group-grid">
                        <div class="form-group">
                            <label for="fecha_deseada" class="form-label">Fecha deseada</label>
                            <input type="date" name="fecha_deseada" class="form-input">
                            <div class="input-icon">📅</div>
                        </div>

                        <div class="form-group">
                            <label for="imagen" class="form-label">Inspiración</label>
                            <div class="file-upload-wrapper">
                                <input type="file" name="imagen" class="form-input">
                                <span class="upload-text">📤 Arrastra o haz clic para subir</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Enviar -->
                <div class="form-submit">
                    <button type="submit" class="submit-button">
                        🚀 Enviar Pedido Especial <span class="button-icon">🎀</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- ESTILOS --}}
<style>
* {
    box-sizing: border-box;
}

body {
    overflow-x: hidden;
    margin: 0;
    padding: 0;
}

.text-brown {
    color: #6d4c41;
}

.special-order-wrapper {
    width: 100%;
    margin: 0 auto;
    padding: 0 1rem;
}

/* Grilla principal */
.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 2rem;
    max-width: 95%;
    margin: 0 auto;
}

/* Tarjetas */
.form-card {
    background: #fffafa;
    border-radius: 20px;
    padding: 2rem;
    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    border: 1px solid #ffd1d1;
    width: 100%;
    overflow: hidden;
}

.form-card-header h2 {
    font-family: 'Playfair Display', serif;
    font-size: 1.75rem;
    margin-bottom: 0.5rem;
}

.decorative-line {
    width: 60px;
    height: 3px;
    background: #ffb3b3;
    border-radius: 2px;
    margin-bottom: 1.5rem;
}

.form-label {
    color: #6d4c41;
    font-weight: 600;
    margin-bottom: 0.5rem;
    display: block;
}

.form-input {
    width: 100%;
    padding: 1rem 1rem 1rem 2.5rem;
    border: 2px solid #ffd1d1;
    border-radius: 12px;
    background: #fff;
    font-size: 1rem;
    transition: border 0.3s ease;
}

.form-input:focus {
    border-color: #ff9494;
    box-shadow: 0 0 0 3px rgba(255, 148, 148, 0.2);
    outline: none;
}

.input-icon {
    position: absolute;
    left: 1rem;
    top: 2.6rem;
    transform: translateY(-50%);
    font-size: 1rem;
    pointer-events: none;
    color: #d88a8a;
}

.form-group {
    position: relative;
    margin-bottom: 1.5rem;
}

/* Grid interna para fecha e imagen */
.form-group-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
}

.file-upload-wrapper {
    border: 2px dashed #ffd1d1;
    border-radius: 12px;
    padding: 1.25rem;
    text-align: center;
    background: #fff;
    height: 100%;
    overflow: hidden;
}

.upload-text {
    color: #6d4c41;
    margin-top: 0.5rem;
    font-size: 0.95rem;
}

/* Botón de enviar */
.form-submit {
    grid-column: 1 / -1;
    text-align: center;
    margin-top: 2rem;
}

.submit-button {
    background: linear-gradient(135deg, #ff9494, #ff6b6b);
    color: white;
    border: none;
    padding: 1rem 2.5rem;
    border-radius: 15px;
    font-size: 1.1rem;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
    width: auto;
}

.submit-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(255, 100, 100, 0.25);
}

.button-icon {
    display: inline-block;
    animation: float 2s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-4px); }
}

/* ✅ Responsividad estricta para pantallas pequeñas */
@media (max-width: 768px) {
    .form-grid {
        grid-template-columns: 1fr;
        max-width: 100%;
        padding: 0;
    }

    .form-card {
        padding: 1.5rem;
        margin-inline: 1rem;
    }

    .form-group-grid {
        grid-template-columns: 1fr;
    }

    .form-input {
        padding-left: 2rem;
        font-size: 1rem;
    }

    .input-icon {
        left: 0.75rem;
    }

    .submit-button {
        width: 100%;
        padding: 1rem;
    }
}

/* Más ajustes finos para móviles muy pequeños (como 375px) */
@media (max-width: 480px) {
    .form-input {
        font-size: 0.95rem;
        padding: 0.9rem 0.9rem 0.9rem 2rem;
    }

    .submit-button {
        font-size: 1rem;
        padding: 0.9rem;
    }

    .form-card {
        padding: 1.25rem;
    }

    .upload-text {
        font-size: 0.9rem;
    }
}

</style>

<!-- Fuente personalizada -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
@endsection
