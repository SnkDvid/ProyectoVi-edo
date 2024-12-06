<!-- Contenido Dashboard -->
@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Catálogo de Imágenes</h1>
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

        .modal-dialog {
            margin-top: 100px;
        }
    </style>

    <!-- Botón para crear nuevo producto -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
        Crear Nuevo Producto
    </button>
    <br>
    <br>

    <div class="grid-container">
        <!-- Ejemplo de imágenes con modales -->
        <div class="grid-item" data-bs-toggle="modal" data-bs-target="#editModal">
            <img src="https://via.placeholder.com/300" alt="Imagen de catálogo">
        </div>   
        <div class="grid-item" data-bs-toggle="modal" data-bs-target="#editModal">
            <img src="https://via.placeholder.com/300" alt="Imagen de catálogo">
        </div>     
        <div class="grid-item" data-bs-toggle="modal" data-bs-target="#editModal">
            <img src="https://via.placeholder.com/300" alt="Imagen de catálogo">
        </div>
        <div class="grid-item" data-bs-toggle="modal" data-bs-target="#editModal">
            <img src="https://via.placeholder.com/300" alt="Imagen de catálogo">
        </div>
        <div class="grid-item" data-bs-toggle="modal" data-bs-target="#editModal">
            <img src="https://via.placeholder.com/300" alt="Imagen de catálogo">
        </div>
        <!-- Agrega más elementos de imagen aquí -->
    </div>

    <!-- Modal para Editar Imagen -->
    <div class="modal" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar Imagen</h5>
                </div>
                <div class="modal-body">
                <form>
                        <div class="mb-3">
                            <label for="new-image-url" class="form-label">Imagen</label>
                            <input type="file" class="form-control" id="new-image-url" placeholder="URL de la imagen">
                        </div>
                        <div class="mb-3">
                            <label for="new-description" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="new-description" placeholder="Nombre del Producto">
                        </div>
                        <div class="mb-3">
                            <label for="new-description" class="form-label">Descripción:</label>
                            <input type="text" class="form-control" id="new-description" placeholder="Descripción del Producto">
                        </div>
                        <div class="mb-3">
                            <label for="new-description" class="form-label">Peso:</label>
                            <input type="text" class="form-control" id="new-description" placeholder="Peso del producto">
                        </div>
                        <div class="mb-3">
                            <label for="product-location" class="form-label">Donde va a ir este producto</label>
                            <select class="form-control" id="product-location">
                                <option value="">Seleccione una opción</option>
                                <option value="opcion1">1. Jugos</option>
                                <option value="opcion2">2. Desayunos</option>
                                <option value="opcion3">3. Nose xdxd</option>
                                <!-- Agrega más opciones según sea necesario -->
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="new-price" class="form-label">Precio:</label>
                            <input type="number" class="form-control" id="new-price" placeholder="Precio del Producto">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Crear Nuevo Producto -->
    <div class="modal" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Crear Nuevo Producto</h5>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="new-image-url" class="form-label">Imagen</label>
                            <input type="file" class="form-control" id="new-image-url" placeholder="URL de la imagen">
                        </div>
                        <div class="mb-3">
                            <label for="new-description" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="new-description" placeholder="Nombre del Producto">
                        </div>
                        <div class="mb-3">
                            <label for="new-description" class="form-label">Descripción:</label>
                            <input type="text" class="form-control" id="new-description" placeholder="Descripción del Producto">
                        </div>
                        <div class="mb-3">
                            <label for="new-description" class="form-label">Peso:</label>
                            <input type="text" class="form-control" id="new-description" placeholder="Peso del producto">
                        </div>
                        <div class="mb-3">
                            <label for="product-location" class="form-label">Donde va a ir este producto</label>
                            <select class="form-control" id="product-location">
                                <option value="">Seleccione una opción</option>
                                <option value="opcion1">1. Jugos</option>
                                <option value="opcion2">2. Desayunos</option>
                                <option value="opcion3">3. Nose xdxd</option>
                                <!-- Agrega más opciones según sea necesario -->
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="new-price" class="form-label">Precio:</label>
                            <input type="number" class="form-control" id="new-price" placeholder="Precio del Producto">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Agregar Producto</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bootstrap JavaScript y Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

@endsection
