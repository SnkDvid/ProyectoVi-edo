<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="font-family: 'Arial', sans-serif; background-color: #f9f9f9; margin: 0; padding: 0;">
    <div style="width: 100%; max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <h1 style="color: #e74c3c; text-align: center; font-size: 24px; margin-bottom: 20px;">Venta Cancelada</h1>
        
        <p style="color: #7f8c8d; font-size: 16px; text-align: center;">Hola, <?php echo e($ventas->first()->cliente->id_nombre_cliente); ?>. Lamentamos informarte que tus compras han sido canceladas. A continuación, te compartimos los detalles:</p>
        
        <?php $__currentLoopData = $ventas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $venta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div style="background-color: #ecf0f1; padding: 10px; border-radius: 5px; margin-top: 10px;">
                <ul style="list-style: none; padding-left: 0;">  
                    <li style="margin-bottom: 8px; font-size: 14px;">
                        <strong><?php echo e($venta->catalogo->id_nombre_producto); ?></strong><br>
                        Cantidad: <?php echo e($venta->id_cantidad); ?> | Precio unitario: $<?php echo e(number_format($venta->id_valor_final, 0, ',', '.')); ?> | Subtotal: $<?php echo e(number_format($venta->id_cantidad * $venta->id_valor_final, 0, ',', '.')); ?>

                    </li>
                </ul>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <p style="font-size: 18px; font-weight: bold; color: #e74c3c; margin-top: 15px; text-align: center;">
            Total: $<?php echo e(number_format($ventas->sum(function($venta) { return $venta->id_cantidad * $venta->id_valor_final; }), 0, ',', '.')); ?>

        </p>

        <div style="text-align: center; font-size: 14px; color: #95a5a6; margin-top: 30px;">
            <p>Si tienes alguna pregunta o necesitas más información, no dudes en contactarnos. Estamos aquí para ayudarte.</p>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\viñedoProyect\resources\views/emails/venta_cancelada.blade.php ENDPATH**/ ?>