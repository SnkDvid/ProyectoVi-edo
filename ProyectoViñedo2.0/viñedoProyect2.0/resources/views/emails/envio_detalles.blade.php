<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #2c3e50;
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        p {
            color: #7f8c8d;
            font-size: 16px;
        }
        .order-details, .client-details {
            background-color: #ecf0f1;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }
        .order-details ul, .client-details ul {
            list-style: none;
            padding-left: 0;
        }
        .order-details li, .client-details li {
            margin-bottom: 8px;
            font-size: 14px;
        }
        .total {
            font-size: 18px;
            font-weight: bold;
            color: #e74c3c;
            margin-top: 15px;
        }
        .footer {
            text-align: center;
            font-size: 14px;
            color: #95a5a6;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Nuevo pedido recibido para envío</h1>
        <p>Detalles del pedido:</p>
        <div class="order-details">
            <ul>
                @foreach ($items as $item)
                    <li>
                        <strong>{{ $item->name }}</strong><br>
                        Cantidad: {{ $item->qty }} | Precio unitario: ${{ number_format($item->price, 0, ',', '.') }} | Subtotal: ${{ number_format($item->qty * $item->price, 0, ',', '.') }}
                    </li>
                @endforeach
            </ul>
        </div>
        <p class="total">Total del pedido: ${{ number_format($total, 0, ',', '.') }}</p>
        <p>Datos del cliente:</p>
        <div class="client-details">
            <ul>
                <li><strong>Nombre:</strong> {{ $cliente->id_nombre_cliente }}</li>
                <li><strong>Teléfono:</strong> {{ $cliente->id_telefono_cliente }}</li>
                <li><strong>Correo:</strong> {{ $cliente->id_correo_cliente }}</li>
                <li><strong>Dirección:</strong> {{ $cliente->id_direccion_cliente }}</li>
                <li><strong>Barrio:</strong> {{ $cliente->id_barrio_cliente }}</li>
            </ul>
        </div>
        <div class="footer">
            <p>Por favor, proceda con el envío del pedido.</p>
        </div>
    </div>
</body>
</html>
