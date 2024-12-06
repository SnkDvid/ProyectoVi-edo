<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto Quitado de la Venta</title>
</head>
<body style="font-family: 'Arial', sans-serif; background-color: #f9f9f9; margin: 0; padding: 0;">
    <div style="width: 100%; max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <h1 style="color: #e74c3c; text-align: center; font-size: 24px; margin-bottom: 20px;">Notificación de Producto Quitado</h1>

        <p style="color: #7f8c8d; font-size: 16px; text-align: center;">
            Estimado/a, Cliente</p>

        <p style="color: #7f8c8d; font-size: 16px; text-align: center;">
            Le informamos que el producto <strong><?php echo e($productoNombre); ?></strong> ha sido quitado de la venta debido a su falta de disponibilidad o por otro motivo relacionado con el stock. Lamentamos cualquier inconveniente que esto pueda causarle. 
            Seguiremos adelante con su venta si hay otros productos que haya comprado.</p>

        <p style="color: #7f8c8d; font-size: 16px; text-align: center;">
            Si quiere cancelar totalmente la compra por favor comuníquese por medio de WhatsApp a este número <strong>0000000000</strong></p>

        <div style="background-color: #ecf0f1; padding: 10px; border-radius: 5px; margin-top: 10px;">
            <h3 style="color: #2c3e50; font-size: 18px;">Detalles del Producto:</h3>
            <ul style="list-style: none; padding-left: 0;">
                <li style="margin-bottom: 8px; font-size: 14px;">
                    <strong>Nombre del Producto:</strong> <?php echo e($productoNombre); ?>

                </li>
                <li style="margin-bottom: 8px; font-size: 14px;">
                    <strong>Categoría:</strong> <?php echo e($categoria); ?>

                </li>
                <li style="margin-bottom: 8px; font-size: 14px;">
                    <strong>Precio:</strong> <?php echo e(number_format($precio, 0, ',', '.')); ?> COP
                </li>
            </ul>
        </div>

        <div style="font-size: 18px; font-weight: bold; color: #e74c3c; margin-top: 15px;">
            <p><strong>Estado de la Venta:</strong> Producto Quitado</p>
        </div>

        <p style="color: #7f8c8d; font-size: 16px;">Si tiene alguna pregunta o desea más información, no dude en contactarnos.</p>

        <div style="text-align: center; font-size: 14px; color: #95a5a6; margin-top: 30px;">
            <p>Gracias por su comprensión.</p>
            <p>Atentamente,</p>
            <p><strong>El equipo de ventas</strong></p>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\viñedoProyect\resources\views/emails/producto_quitado.blade.php ENDPATH**/ ?>