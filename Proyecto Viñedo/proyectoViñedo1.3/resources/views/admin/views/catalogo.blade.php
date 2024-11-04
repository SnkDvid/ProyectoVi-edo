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
            width: auto; /* Ajusta el ancho del item a su contenido */
            max-width: 300px; /* O el tamaño que prefieras */
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
              opacity: 0.7; /* Cambia este valor para ajustar el nivel de opacidad */
          }

          .modal-backdrop {
              pointer-events: none; /* Esto hará que el backdrop no bloquee interacciones */
              background-color: transparent; /* Elimina el color de fondo */
          }

          .modal-dialog {
    margin-top: 100px; /* Ajusta este valor según lo necesites */
}

    </style>

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

    <!-- Modal Bootstrap -->
    <div class="modal" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar Imagen</h5>
                    
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="image-url" class="form-label">URL de la Imagen:</label>
                            <input type="text" class="form-control" id="image-url" placeholder="URL de la imagen">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Descripción:</label>
                            <input type="text" class="form-control" id="description" placeholder="Descripción de la imagen">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Precio:</label>
                            <input type="number" class="form-control" id="price" placeholder="Precio">
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
</section>

<!-- Bootstrap JavaScript y Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<!-- Aquí es donde debes agregar el script -->
<script>
    $(document).ready(function() {
        $('#editModal').modal({ show: false }); // Asegúrate de que el modal esté preparado
    });
</script>

@endsection
