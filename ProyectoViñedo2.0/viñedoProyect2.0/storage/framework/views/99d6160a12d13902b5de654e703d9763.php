<!-- Contenido Dashboard -->


<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Productos inhabilitados ❌</h1>
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
        .btn_habilitar{
            margin-top: 10px;
        }
    </style>

    <div class="grid-container">
    <?php $__currentLoopData = $catalogos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catalogo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="grid-item" data-bs-toggle="modal" data-bs-target="#editModal<?php echo e($catalogo->id); ?>">
            <img src="<?php echo e(asset($catalogo->id_imagen_producto)); ?>" alt="Imagen de catálogo">
            <div class="grid-item-text">
                <br>
                <center><h5><strong>Nombre:</strong> <?php echo e($catalogo->id_nombre_producto); ?></h5></center>
                <center><h6><strong>Descripción:</strong> <?php echo e($catalogo->id_descripcion); ?></h6></center>
                <center><h6><strong>Precio:</strong> $<?php echo e(number_format($catalogo->id_precio, 0, ',', '.')); ?></h6></center>
                <center><h6><strong>Peso:</strong> <?php echo e($catalogo->id_peso); ?></h6></center>
                <center><h6><strong>Cat:</strong> <?php echo e($catalogo->id_categoria); ?></h6></center>

            </div>
        </div>

        <!-- Modal para Editar Imagen -->
        <div class="modal" id="editModal<?php echo e($catalogo->id); ?>" tabindex="-1" aria-labelledby="editModalLabel<?php echo e($catalogo->id); ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel<?php echo e($catalogo->id); ?>">Ver Producto</h5>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('admin.catalogo.update', $catalogo->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <!-- Imagen actual -->
                    <div class="mb-3">
                        <label class="form-label">Imagen actual:</label>
                        <img src="<?php echo e(asset($catalogo->id_imagen_producto)); ?>" alt="Imagen actual" class="img-fluid mb-2">
                    </div>

                    <!-- Nombre -->
                    <div class="mb-3">
                        <label for="new-description-<?php echo e($catalogo->id); ?>" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="new-description-<?php echo e($catalogo->id); ?>" name="nombre" value="<?php echo e($catalogo->id_nombre_producto); ?>" readonly>
                    </div>

                    <!-- Descripción -->
                    <div class="mb-3">
                        <label for="new-description-<?php echo e($catalogo->id); ?>" class="form-label">Descripción:</label>
                        <input type="text" class="form-control" id="new-description-<?php echo e($catalogo->id); ?>" name="descripcion" value="<?php echo e($catalogo->id_descripcion); ?>" readonly>
                    </div>

                    <!-- Precio -->
                    <div class="mb-3">
                        <label for="new-price-<?php echo e($catalogo->id); ?>" class="form-label">Precio:</label>
                        <input type="text" class="form-control" id="new-price-<?php echo e($catalogo->id); ?>" name="precio" value="<?php echo e(number_format($catalogo->id_precio, 0, '', '')); ?>" readonly>
                    </div>

                    <!-- Peso -->
                    <div class="mb-3">
                        <label for="new-description-<?php echo e($catalogo->id); ?>" class="form-label">Peso:</label>
                        <input type="text" class="form-control" id="new-description-<?php echo e($catalogo->id); ?>" name="peso" value="<?php echo e($catalogo->id_peso); ?>" readonly>
                    </div>

                    <!-- Categoría -->
                    <div class="mb-3">
                        <label for="product-location-<?php echo e($catalogo->id); ?>" class="form-label">Donde va a ir este producto</label>
                        <select class="form-control" id="product-location-<?php echo e($catalogo->id); ?>" name="categoria" disabled>
                            <option value="jugos" <?php if($catalogo->id_categoria == 'jugos'): ?> selected <?php endif; ?>>1. Jugos</option>
                            <option value="desayunos" <?php if($catalogo->id_categoria == 'desayunos'): ?> selected <?php endif; ?>>2. Desayunos</option>
                            <option value="pulpas" <?php if($catalogo->id_categoria == 'pulpas'): ?> selected <?php endif; ?>>3. Pulpas</option>
                            <option value="batidos" <?php if($catalogo->id_categoria == 'batidos'): ?> selected <?php endif; ?>>4. Batidos</option>
                        </select>
                        </div>
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cerrar</button>
                            </form>
                            
                            <form action="<?php echo e(route('admin.catalogo.habilitar', $catalogo->id)); ?>" method="POST" class="btn_habilitar">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <button type="submit" class="btn btn-primary">Habilitar ✅</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</section>
<!-- Bootstrap JavaScript y Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\viñedoProyect\resources\views/admin/views/inhabilitados.blade.php ENDPATH**/ ?>