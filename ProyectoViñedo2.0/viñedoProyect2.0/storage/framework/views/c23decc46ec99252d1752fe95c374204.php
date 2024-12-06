

<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Ventas Canceladas </h1>
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
            border-top: 2px solid #B6E388;
            margin: 20px 0;
            width: 100%;
        }

        .cliente-header {
            background-color: #f8fafc;
            padding: 7px;
            margin-top: 5px;
            border-left: 4px solid #B6E388;
        }

        /* Estilos para hacer la tabla responsive */
        .table-responsive {
            overflow-x: auto;
        }

        
    </style>

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
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\viñedoProyect\resources\views/admin/views/InhabilitadoVentas.blade.php ENDPATH**/ ?>