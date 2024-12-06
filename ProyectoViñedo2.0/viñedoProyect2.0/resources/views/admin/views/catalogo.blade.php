<!-- Contenido Dashboard -->
@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Catálogo Productos </h1>
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

    <!-- Botón para crear nuevo producto -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
        Crear Nuevo Producto ➕
    </button>
    
    <br>
    <br>

    <div class="grid-container">
    @foreach ($catalogos as $catalogo)
        <div class="grid-item" data-bs-toggle="modal" data-bs-target="#editModal{{ $catalogo->id }}">
        <img src="{{ asset($catalogo->id_imagen_producto) }}" alt="Imagen del producto">

            <div class="grid-item-text">
                <br>
                <center><h5><strong>Nombre:</strong> {{ $catalogo->id_nombre_producto }}</h5></center>
                <center><h6><strong>Descripción:</strong> {{ $catalogo->id_descripcion }}</h6></center>
                <center><h6><strong>Precio:</strong> ${{ number_format($catalogo->id_precio, 0, ',', '.') }}</h6></center>
                <center><h6><strong>Peso:</strong> {{ $catalogo->id_peso }}</h6></center>
                <center><h6><strong>Cat:</strong> {{ $catalogo->id_categoria }}</h6></center>
                

            </div>
        </div>

        <!-- Modal para Editar Imagen -->
        <div class="modal" id="editModal{{ $catalogo->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $catalogo->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $catalogo->id }}">Editar Producto</h5>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.catalogo.update', $catalogo->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label">Imagen actual:</label>
                                <img src="{{ asset($catalogo->id_imagen_producto) }}" alt="Imagen actual" class="img-fluid mb-2">
                            </div>

                            <div class="mb-3">
                                <label for="new-image-url-{{ $catalogo->id }}" class="form-label">Imagen</label>
                                <input type="file" class="form-control" id="new-image-url-{{ $catalogo->id }}" name="image" value="{{ $catalogo->image }}">
                            </div>

                            <div class="mb-3">
                                <label for="new-description-{{ $catalogo->id }}" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="new-description-{{ $catalogo->id }}" name="nombre" value="{{ $catalogo->id_nombre_producto }}">
                            </div>

                            <div class="mb-3">
                                <label for="new-description-{{ $catalogo->id }}" class="form-label">Descripción:</label>
                                <input type="text" class="form-control" id="new-description-{{ $catalogo->id }}" name="descripcion" value="{{ $catalogo->id_descripcion }}">
                            </div>

                            <div class="mb-3">
                                <label for="new-price-{{ $catalogo->id }}" class="form-label">Precio:</label>
                                <input type="text" class="form-control" id="new-price-{{ $catalogo->id }}" name="precio" value="{{ number_format($catalogo->id_precio, 0, '', '') }}">
                            </div>

                            <div class="mb-3">
                                <label for="new-description-{{ $catalogo->id }}" class="form-label">Peso:</label>
                                <input type="text" class="form-control" id="new-description-{{ $catalogo->id }}" name="peso" value="{{ $catalogo->id_peso }}">
                            </div>

                            <div class="mb-3">
                                <label for="product-location-{{ $catalogo->id }}" class="form-label">Donde va a ir este producto</label>
                                <select class="form-control" id="product-location-{{ $catalogo->id }}" name="categoria">
                                    <option value="jugos" @if($catalogo->id_categoria == 'jugos') selected @endif>1. Jugos</option>
                                    <option value="desayunos" @if($catalogo->id_categoria == 'desayunos') selected @endif>2. Desayunos</option>
                                    <option value="pulpas" @if($catalogo->id_categoria == 'pulpas') selected @endif>3. Pulpas</option>
                                    <option value="batidos" @if($catalogo->id_categoria == 'batidos') selected @endif>4. Batidos</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar Cambios ✅</button>
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cerrar 🚫</button>
                            </form>
                            
                            <form action="{{ route('admin.catalogo.inhabilitar', $catalogo->id) }}" class="btn_inhabilitar" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-danger">Inhabilitar ⚠️</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<!-- Modal para Crear Nuevo Producto -->
<div class="modal" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Crear Nuevo Producto</h5>
                </div>
                <div class="modal-body">
                                <form action="{{ route('admin.catalogo.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="new-image-url" class="form-label">Imagen</label>
                        <input type="file" class="form-control" id="new-image-url" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="new-description" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="new-description" name="nombre" placeholder="Nombre del Producto" >
                    </div>
                    <div class="mb-3">
                        <label for="new-description" class="form-label">Descripción:</label>
                        <input type="text" class="form-control" id="new-description" name="descripcion" placeholder="Descripción del Producto" >
                    </div>
                    <div class="mb-3">
                        <label for="new-description" class="form-label">Precio:</label>
                        <input type="number" class="form-control" id="new-description" name="precio" placeholder="Precio del producto" >
                    </div>
                    <div class="mb-3">
                        <label for="new-price" class="form-label">Peso:</label>
                        <input type="text" class="form-control" id="new-price" name="peso" placeholder="Peso del Producto" >
                    </div>
                    <div class="mb-3">
                        <label for="product-location" class="form-label">Donde va a ir este producto</label>
                        <select class="form-control" id="product-location" name="categoria" >
                            <option value="">Seleccione una opción</option>
                            <option value="jugos">1. Jugos</option>
                            <option value="desayunos">2. Desayunos</option>
                            <option value="pulpas">3. Pulpas</option>
                            <option value="batidos">4. Batidos</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar Producto</button>
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cerrar</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Bootstrap JavaScript y Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

@endsection
