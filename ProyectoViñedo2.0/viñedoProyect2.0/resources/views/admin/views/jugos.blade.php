<!-- Contenido Dashboard -->
@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Catalogo Jugos y Batidos </h1>
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

    <div>
        <h2>Jugos</h2>
    <div class="grid-container">
    @foreach ($jugos as $jugo)
        <div class="grid-item" data-bs-toggle="modal" data-bs-target="#editModal{{ $jugo->id }}">
            <img src="{{ asset('storage/' . $jugo->id_imagen_producto) }}" alt="Imagen de catálogo">
            <div class="grid-item-text">
                <br>
                <center><h5><strong>Nombre:</strong> {{ $jugo->id_nombre_producto }}</h5></center>
                <center><h6><strong>Descripción:</strong> {{ $jugo->id_descripcion }}</h6></center>
                <center><h6><strong>Precio:</strong> ${{ number_format($jugo->id_precio, 0, ',', '.') }}</h6></center>
                <center><h6><strong>Peso:</strong> {{ $jugo->id_peso }}</h6></center>
                <center><h6><strong>Cat:</strong> {{ $jugo->id_categoria }}</h6></center>
                

            </div>
        </div>

        <!-- Modal para Editar Imagen -->
        <div class="modal" id="editModal{{ $jugo->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $jugo->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $jugo->id }}">Editar Producto</h5>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.catalogo.update', $jugo->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label">Imagen actual:</label>
                                <img src="{{ asset('storage/' . $jugo->id_imagen_producto) }}" alt="Imagen actual" class="img-fluid mb-2" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="new-image-url-{{ $jugo->id }}" class="form-label">Imagen</label>
                                <input type="file" class="form-control" id="new-image-url-{{ $jugo->id }}" name="image" value="{{ $jugo->image }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="new-description-{{ $jugo->id }}" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="new-description-{{ $jugo->id }}" name="nombre" value="{{ $jugo->id_nombre_producto }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="new-description-{{ $jugo->id }}" class="form-label">Descripción:</label>
                                <input type="text" class="form-control" id="new-description-{{ $jugo->id }}" name="descripcion" value="{{ $jugo->id_descripcion }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="new-price-{{ $jugo->id }}" class="form-label">Precio:</label>
                                <input type="text" class="form-control" id="new-price-{{ $jugo->id }}" name="precio" value="{{ number_format($jugo->id_precio, 0, '', '') }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="new-description-{{ $jugo->id }}" class="form-label">Peso:</label>
                                <input type="text" class="form-control" id="new-description-{{ $jugo->id }}" name="peso" value="{{ $jugo->id_peso }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="product-location-{{ $jugo->id }}" class="form-label">Donde va a ir este producto</label>
                                <select class="form-control" id="product-location-{{ $jugo->id }}" name="categoria" disabled>
                                    <option value="jugos" @if($jugo->id_categoria == 'jugos') selected @endif>1. Jugos</option>
                                    <option value="desayunos" @if($jugo->id_categoria == 'desayunos') selected @endif>2. Desayunos</option>
                                    <option value="pulpa" @if($jugo->id_categoria == 'pulpas') selected @endif>3. Pulpas</option>
                                    <option value="batidos" @if($jugo->id_categoria == 'batidos') selected @endif>3. Batidos</option>
                                </select>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
</div>
<br> 

<div>
        <h2>Batidos</h2>
<div class="grid-container">
    @foreach ($batidos as $batido)
        <div class="grid-item" data-bs-toggle="modal" data-bs-target="#editModal{{ $batido->id }}">
        <img src="{{ asset('storage/' . $batido->id_imagen_producto) }}" alt="Imagen de catálogo">
            <div class="grid-item-text">
                <br>
                <center><h5><strong>Nombre:</strong> {{ $batido->id_nombre_producto }}</h5></center>
                <center><h6><strong>Descripción:</strong> {{ $batido->id_descripcion }}</h6></center>
                <center><h6><strong>Precio:</strong> ${{ number_format($batido->id_precio, 0, ',', '.') }}</h6></center>
                <center><h6><strong>Peso:</strong> {{ $batido->id_peso }}</h6></center>
                <center><h6><strong>Cat:</strong> {{ $batido->id_categoria }}</h6></center>
                

            </div>
        </div>

        <!-- Modal para Editar Imagen -->
        <div class="modal" id="editModal{{ $batido->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $batido->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $batido->id }}">Editar Producto</h5>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.catalogo.update', $batido->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label">Imagen actual:</label>
                                <img src="{{ asset('storage/' . $batido->id_imagen_producto) }}" alt="Imagen actual" class="img-fluid mb-2" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="new-image-url-{{ $batido->id }}" class="form-label">Imagen</label>
                                <input type="file" class="form-control" id="new-image-url-{{ $batido->id }}" name="image" value="{{ $batido->image }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="new-description-{{ $batido->id }}" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="new-description-{{ $batido->id }}" name="nombre" value="{{ $batido->id_nombre_producto }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="new-description-{{ $batido->id }}" class="form-label">Descripción:</label>
                                <input type="text" class="form-control" id="new-description-{{ $batido->id }}" name="descripcion" value="{{ $batido->id_descripcion }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="new-price-{{ $batido->id }}" class="form-label">Precio:</label>
                                <input type="text" class="form-control" id="new-price-{{ $batido->id }}" name="precio" value="{{ number_format($batido->id_precio, 0, '', '') }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="new-description-{{ $batido->id }}" class="form-label">Peso:</label>
                                <input type="text" class="form-control" id="new-description-{{ $batido->id }}" name="peso" value="{{ $batido->id_peso }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="product-location-{{ $batido->id }}" class="form-label">Donde va a ir este producto</label>
                                <select class="form-control" id="product-location-{{ $batido->id }}" name="categoria" disabled>
                                    <option value="jugos" @if($batido->id_categoria == 'jugos') selected @endif>1. Jugos</option>
                                    <option value="desayunos" @if($batido->id_categoria == 'desayunos') selected @endif>2. Desayunos</option>
                                    <option value="pulpa" @if($batido->id_categoria == 'pulpas') selected @endif>3. Pulpas</option>
                                    <option value="batidos" @if($batido->id_categoria == 'batidos') selected @endif>4. Batidos</option>
                                </select>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
</div>

</section>
<!-- Bootstrap JavaScript y Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

@endsection
