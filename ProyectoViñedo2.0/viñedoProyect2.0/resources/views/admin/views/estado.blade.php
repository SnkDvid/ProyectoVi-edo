@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Ventas </h1>
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

        .table-responsive {
            overflow-x: auto;
        }

    </style>

    <a href=" {{route('admin.views.reporteVentas')}} "><button class="btn btn-danger mb-2">PDF 📈</button></a>
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
                            @php
                                $currentClienteId = null;
                            @endphp

                            @foreach($ventas as $venta)
                                @if($currentClienteId !== $venta->cliente_id)
                                    @if(!is_null($currentClienteId))
                                        <tr>
                                            <td colspan="13">
                                                <div class="cliente-separator"></div>
                                            </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td colspan="13">
                                            <div class="cliente-header">
                                                <strong>Cliente:</strong> {{$venta->cliente->id_nombre_cliente}} | 
                                                <strong>Teléfono:</strong> {{$venta->cliente->id_telefono_cliente}} |
                                                <strong>Dirección:</strong> {{$venta->cliente->id_direccion_cliente}} |
                                                <form action="{{ route('admin.ventas.cancelarTotalmente', $venta->cliente->id) }}" method="POST" class="d-inline-block">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-danger ml-3">
                                                        Cancelar Venta Totalmente ⚠️
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @php
                                        $currentClienteId = $venta->cliente_id;
                                    @endphp
                                @endif

                                <tr class="align-middle">
                                    <td><img src="{{ asset($venta->catalogo->id_imagen_producto) }}" width="50" alt="Imagen de catálogo"></td>
                                    <td>{{$venta->catalogo->id_nombre_producto}}</td>
                                    <td>{{$venta->catalogo->id_categoria}}</td>
                                    <td>{{$venta->id_cantidad}}</td>
                                    <td>{{$venta->cliente->id_nombre_cliente}}</td>
                                    <td>{{$venta->cliente->id_telefono_cliente}}</td>
                                    <td>{{$venta->cliente->id_correo_cliente}}</td>
                                    <td>{{$venta->cliente->id_direccion_cliente}}</td>
                                    <td>{{$venta->cliente->id_barrio_cliente}}</td>
                                    <td>{{ number_format($venta->id_valor_final, 0, ',','.')}}</td>
                                    <td>{{ number_format($venta->id_cantidad * $venta->id_valor_final, 0, ',','.')}}</td>
                                    <td>{{$venta->id_estado_venta}}</td>
                                    <td>
                                        <button class="btn btn-icon btn-primary mb-2" data-toggle="modal" data-target="#editVentaModal-{{$venta->id}}">
                                            Editar
                                        </button>
                                        <form action=" {{route('admin.ventas.cancelar', $venta->id)}} " class="btn_inhabilitar" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-warning">Quitar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Paginación con estilos de Bootstrap y en español -->
                    <div class="pagination-container">
                        {{ $ventas->links('pagination::bootstrap-4') }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
