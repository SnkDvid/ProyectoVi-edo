

<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Ventas</h1>
    </div>

    <style>
        h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            width: 100%;
            max-width: 1500px;
        }

        .grid-item {
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            width: auto;
            max-width: 300px;
        }

        .grid-item img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            display: block;
        }

        .grid-item:hover {
            opacity: 0.7;
        }

        .modal-backdrop {
            pointer-events: none;
            background-color: transparent;
        }

        .modal {
            z-index: 1050 !important;
        }

        .modal-content {
            max-height: 80vh;
            overflow-y: auto;
        }

        .modal-dialog {
            margin-top: 80px;
        }

        .btn_inhabilitar {
            margin-top: 10px;
        }

        .cliente-separator {
            border-top: 2px solid #3490dc;
            margin: 20px 0;
            width: 100%;
        }

        .cliente-header {
            background-color: #f8fafc;
            padding: 7px;
            margin-top: 5px;
            border-left: 4px solid #3490dc;
        }

        /* Estilos para hacer la tabla responsive */
        .table-responsive {
            overflow-x: auto;
        }

        
    </style>

    <a href="#"><button class="btn btn-danger mb-2">PDF</button></a>
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-body">
                <!-- Contenedor de la tabla con la clase "table-responsive" -->
                <div class="table-responsive">
                    <table id="productos" class="table table-striped">
                        <thead>
                            <th>Imagen producto</th>
                            <th>Nombre producto</th>
                            <th>Categoria producto</th>
                            <th>Cantidad producto</th>
                            <th>Nombre Cliente</th>
                            <th>Telefono Cliente</th>
                            <th>Correo Cliente</th>
                            <th>Direccion Cliente</th>
                            <th>Barrio Cliente</th>
                            <th>Precio unitario</th>
                            <th>Precio Final</th>
                            <th>Estado de venta</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                            <?php
                                $currentClienteId = null;
                            ?>

                            <?php $__currentLoopData = $ventas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $venta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($currentClienteId !== $venta->cliente_id): ?>
                                    <?php if(!is_null($currentClienteId)): ?>
                                        <tr>
                                            <td colspan="13">
                                                <div class="cliente-separator"></div>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <tr>
                                        <td colspan="13">
                                            <div class="cliente-header">
                                                <strong>Cliente:</strong> <?php echo e($venta->cliente->id_nombre_cliente); ?> | 
                                                <strong>Teléfono:</strong> <?php echo e($venta->cliente->id_telefono_cliente); ?> |
                                                <strong>Dirección:</strong> <?php echo e($venta->cliente->id_direccion_cliente); ?>

                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                        $currentClienteId = $venta->cliente_id;
                                    ?>
                                <?php endif; ?>

                                <tr class="align-middle">
                                    <td><img src="<?php echo e(asset($venta->catalogo->id_imagen_producto)); ?>" width="50" alt="Imagen de catálogo"></td>
                                    <td><?php echo e($venta->catalogo->id_nombre_producto); ?></td>
                                    <td><?php echo e($venta->catalogo->id_categoria); ?></td>
                                    <td><?php echo e($venta->id_cantidad); ?></td>
                                    <td><?php echo e($venta->cliente->id_nombre_cliente); ?></td>
                                    <td><?php echo e($venta->cliente->id_telefono_cliente); ?></td>
                                    <td><?php echo e($venta->cliente->id_correo_cliente); ?></td>
                                    <td><?php echo e($venta->cliente->id_direccion_cliente); ?></td>
                                    <td><?php echo e($venta->cliente->id_barrio_cliente); ?></td>
                                    <td><?php echo e(number_format($venta->id_valor_final, 0, ',','.')); ?></td>
                                    <td><?php echo e(number_format($venta->id_cantidad * $venta->id_valor_final, 0, ',','.')); ?></td>
                                    <td><?php echo e($venta->id_estado_venta); ?></td>
                                    <td>
                                        <button class="btn btn-icon btn-primary mb-2" data-toggle="modal" data-target="#editVentaModal-<?php echo e($venta->id); ?>">
                                            Editar
                                            <i class="far fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- modal para abrir la venta -->
                                <div class="modal fade" id="editVentaModal-<?php echo e($venta->id); ?>" tabindex="-1" aria-labelledby="editVentaModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editVentaModalLabel">Editar Venta</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <center><p>Unicamente podra ediar registros de la venta como: cantidad, precio y el estado.</p></center>
                                            <form action="<?php echo e(route('ventas.update', $venta->id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PUT'); ?>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="product-category">Categoría del producto</label>
                                                        <select class="form-control" id="product-category-<?php echo e($venta->id); ?>" name="categoria_id" disabled>
                                                            <option value="jugos" <?php if($venta->catalogo->id_categoria == 'jugos'): ?> selected <?php endif; ?>>Jugos</option>
                                                            <option value="desayunos" <?php if($venta->catalogo->id_categoria == 'desayunos'): ?> selected <?php endif; ?>>Desayunos</option>
                                                            <option value="pulpas" <?php if($venta->catalogo->id_categoria == 'pulpas'): ?> selected <?php endif; ?>>Pulpas</option>
                                                            <option value="batidos" <?php if($venta->catalogo->id_categoria == 'batidos'): ?> selected <?php endif; ?>>Batidos</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="product-name">Producto</label>
                                                        <select class="form-control" id="product-name-<?php echo e($venta->id); ?>" name="id_nombre_producto" disabled>
                                                            <option value="<?php echo e($venta->catalogo->id_nombre_producto); ?>" selected><?php echo e($venta->catalogo->id_nombre_producto); ?></option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Imagen del producto actual:</label>
                                                        <img src="<?php echo e(asset('storage/' . $venta->catalogo->id_imagen_producto)); ?>" width="100" alt="Imagen actual" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="id_cantidad">Cantidad</label>
                                                        <input type="number" name="id_cantidad" class="form-control" value="<?php echo e($venta->id_cantidad); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="id_telefono_cliente">Telefono Cliente</label>
                                                        <input type="number" name="id_telefono_cliente" class="form-control" value="<?php echo e($venta->cliente->id_telefono_cliente); ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="id_direccion_cliente">Direccion del cliente</label>
                                                        <input type="text" name="id_direccion_cliente" class="form-control" value="<?php echo e($venta->cliente->id_direccion_cliente); ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="id_barrio_cliente">Barrio del cliente</label>
                                                        <input type="text" name="id_barrio_cliente" class="form-control" value="<?php echo e($venta->cliente->id_barrio_cliente); ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="id_valor_final">Precio Final</label>
                                                        <input type="number" name="id_valor_final" class="form-control" value="<?php echo e($venta->id_valor_final); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="id_estado_venta">Estado</label>
                                                        <select name="id_estado_venta" class="form-control">
                                                            <option value="Pendiente" <?php if($venta->id_estado_venta == 'Pendiente'): ?> selected <?php endif; ?>>Pendiente</option>
                                                            <option value="Completado" <?php if($venta->id_estado_venta == 'Completado'): ?> selected <?php endif; ?>>Completado</option>
                                                            <option value="Cancelado" <?php if($venta->id_estado_venta == 'Cancelado'): ?> selected <?php endif; ?>>Cancelado</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\viñedoProyect\resources\views/admin/views/inhabilitadoVentas.blade.php ENDPATH**/ ?>