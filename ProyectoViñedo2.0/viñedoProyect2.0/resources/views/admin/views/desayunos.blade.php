<!-- Contenido Dashboard -->
@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Desayuos</h1>
    </div>

    <style>
        h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        /* Contenedor de la cuadrícula */
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            width: 100%;
            max-width: 1500px;
        }

        /* Estilos de cada tarjeta de imagen */
        .grid-item {
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            width: auto;
            max-width: 300px;
        }

        /* Estilo de las imágenes */
        .grid-item img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            display: block;
        }

        /* Efecto de opacidad al pasar el mouse */
        .grid-item:hover {
            opacity: 0.7;
        }

        .modal-backdrop {
            pointer-events: none;
            background-color: transparent;
        }

        /* Ajuste del z-index para asegurar que el modal esté en primer plano */
        .modal {
            z-index: 1050 !important;
        }

        /* Asegurar que el navbar esté en segundo plano *

        /* Desplazamiento dentro del contenido del modal */
        .modal-content {
            max-height: 80vh; /* Ajusta la altura si es necesario */
            overflow-y: auto;
        }

        /* Ajuste del margen superior para el modal */
        .modal-dialog {
            margin-top: 80px; /* Ajusta la distancia desde la parte superior de la pantalla */
        }
        .btn_inhabilitar{
            margin-top: 10px;
        }
    </style>

    <br>
    <br>

    <div class="grid-container">
    @foreach ($desayunos as $desayuno)
        <div class="grid-item" data-bs-toggle="modal" data-bs-target="#editModal{{ $desayuno->id }}">
            <img src="{{ asset('storage/' . $desayuno->id_imagen_producto) }}" alt="Imagen de catálogo">
            <div class="grid-item-text">
                <br>
                <center><h5><strong>Nombre:</strong> {{ $desayuno->id_nombre_producto }}</h5></center>
                <center><h6><strong>Descripción:</strong> {{ $desayuno->id_descripcion }}</h6></center>
                <center><h6><strong>Precio:</strong> ${{ number_format($desayuno->id_precio, 0, ',', '.') }}</h6></center>
                <center><h6><strong>Peso:</strong> {{ $desayuno->id_peso }}</h6></center>
                <center><h6><strong>Cat:</strong> {{ $desayuno->id_categoria }}</h6></center>
            </div>
        </div>

        <!-- Modal para Editar Imagen -->
        <div class="modal" id="editModal{{ $desayuno->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $desayuno->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $desayuno->id }}">Editar Producto</h5>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.catalogo.update', $desayuno->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label">Imagen actual:</label>
                                <img src="{{ asset('storage/' . $desayuno->id_imagen_producto) }}" alt="Imagen actual" class="img-fluid mb-2" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="new-image-url-{{ $desayuno->id }}" class="form-label">Imagen</label>
                                <input type="file" class="form-control" id="new-image-url-{{ $desayuno->id }}" name="image" value="{{ $desayuno->image }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="new-description-{{ $desayuno->id }}" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="new-description-{{ $desayuno->id }}" name="nombre" value="{{ $desayuno->id_nombre_producto }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="new-description-{{ $desayuno->id }}" class="form-label">Descripción:</label>
                                <input type="text" class="form-control" id="new-description-{{ $desayuno->id }}" name="descripcion" value="{{ $desayuno->id_descripcion }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="new-price-{{ $desayuno->id }}" class="form-label">Precio:</label>
                                <input type="text" class="form-control" id="new-price-{{ $desayuno->id }}" name="precio" value="{{ number_format($desayuno->id_precio, 0, '', '') }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="new-description-{{ $desayuno->id }}" class="form-label">Peso:</label>
                                <input type="text" class="form-control" id="new-description-{{ $desayuno->id }}" name="peso" value="{{ $desayuno->id_peso }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="product-location-{{ $desayuno->id }}" class="form-label">Donde va a ir este producto</label>
                                <select class="form-control" id="product-location-{{ $desayuno->id }}" name="categoria" disabled>
                                    <option value="jugos" @if($desayuno->id_categoria == 'jugos') selected @endif>1. Jugos</option>
                                    <option value="desayunos" @if($desayuno->id_categoria == 'desayunos') selected @endif>2. Desayunos</option>
                                    <option value="pulpa" @if($desayuno->id_categoria == 'pulpas') selected @endif>3. Pulpas</option>
                                    <option value="batidos" @if($desayuno->id_categoria == 'batidos') selected @endif>4. Batidos</option>
                                </select>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

</section>
<!-- Bootstrap JavaScript y Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

@endsection
