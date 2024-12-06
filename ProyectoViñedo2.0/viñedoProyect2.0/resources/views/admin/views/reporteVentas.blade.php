<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Reporte de Usuarios</title>
    <link rel="icon" type="image/png" href="{{  asset('backend/assets/img/viñedoLogo.png') }}">

    <!-- Cargar fuente de Bootstrap o Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    
    <!-- Estilos personalizados emulando Bootstrap -->
    <style>
        /* Usar la fuente de Bootstrap (Roboto) */
        body {
            font-family: 'Roboto', sans-serif;
        }

        /* Estilos de la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;           
        }

        /* Estilo para las celdas de las tablas (th, td) */
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
            font-size: 1rem; /* Tamaño de letra de la tabla similar a Bootstrap */
        }

        /* Fondo de los encabezados */
        th {
            background-color: #f8f9fa;
            font-weight: 500;
        }

        /* Estilo para las filas alternas */
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Estilo para las filas */
        tr:hover {
            background-color: #e9ecef;
        }

        /* Alineación de texto centrado */
        .text-center {
            text-align: center;
        }

        /* Estilos para emular el badge de Bootstrap */
        .badge {
            display: inline-block;
            padding: .25em .4em;
            font-size: 80%; /* Aumenté el tamaño de la fuente */
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25rem;
            margin-bottom: 8px; /* Separación inferior entre los badges */
        }

        /* Estilo para el badge primario */
        .badge-primary {
            color: #677D6A;
            background-color: #C0EBA6;
        }

        .badge-pill {
            border-radius: 40rem;
        }
    </style>
</head>

<body>

    <h2 class="text-center">Listado de Usuarios</h2>

    <table>
        <thead>
            <tr>
                <th>Nombre Cliente</th>
                <th>Correo Cliente</th>
                <th>Telefono Cliente</th>
                <th>Direccion Cliente</th>
                <th>Barrio Cliente</th>
                <th>Informacion de los productos</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ventas as $venta)
                <tr>
                    <td>{{$venta->cliente->id_nombre_cliente}}</td>
                    <td>{{$venta->cliente->id_correo_cliente}}</td>
                    <td>{{$venta->cliente->id_telefono_cliente}}</td>
                    <td>{{$venta->cliente->id_direccion_cliente}}</td>
                    <td>{{$venta->cliente->id_barrio_cliente}}</td>
                    <td>
                        <span class="badge badge-pill badge-primary">Nombre producto: {{$venta->catalogo->id_nombre_producto}}</span><br>
                        <span class="badge badge-pill badge-primary">Categoria: {{$venta->catalogo->id_categoria}}</span><br>
                        <span class="badge badge-pill badge-primary">Cantidad: {{$venta->id_cantidad}}</span><br>
                        <span class="badge badge-pill badge-primary">Valor Total:  {{ number_format($venta->id_cantidad * $venta->id_valor_final, 0, ',','.')}}</span><br>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
