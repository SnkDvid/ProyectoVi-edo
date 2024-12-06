<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Vinedo</title>
</head>
<body>
<nav>
    <ul class="navbar-nav ms-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('checkout') }}">Carrito <span class="badge bg-danger">{{\Cart::count()}}</span></a>
        </li>
    </nav>
<section class="section">
    <div class="section-header">
        <h1>Catalogo Jugos y Batidos </h1>
    </div>


    <div>
        <h2>Jugos</h2>
    <div class="grid-container">
    @foreach ($jugos as $jugo)
        <div class="grid-item" data-bs-toggle="modal" data-bs-target="#editModal{{ $jugo->id }}">
            <img src="{{ asset($jugo->id_imagen_producto) }}" alt="Imagen de catálogo">
            <div class="grid-item-text">
                <br>
                <h5><strong>Nombre:</strong> {{ $jugo->id_nombre_producto }}</h5>
                <h6><strong>Descripción:</strong> {{ $jugo->id_descripcion }}</h6>
                <h6><strong>Precio:</strong> ${{ number_format($jugo->id_precio, 0, ',', '.') }}</h6>
                <h6><strong>Peso:</strong> {{ $jugo->id_peso }}</h6>
                <h6><strong>Cat:</strong> {{ $jugo->id_categoria }}</h6> 
            </div>
            
                <form action="{{ route('add') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$jugo->id}}">
                    <div class="mb-3">
                        <label for="cantidad{{ $jugo->id }}" class="form-label">Cantidad:</label>
                        <input type="number" name="cantidad" id="cantidad{{ $jugo->id }}" class="form-control" value="1" min="1">
                    </div>
                    <div class="button-add">
                    <input type="submit" name="btn" class="btn btn-primary w-100" value="Agregar al carrito">
                    </div>
                </form>
               
        </div>
    @endforeach
    </div>
</div>

<br>

<div>
        <h2>Desayunos</h2>
        <div class="grid-container">
    @foreach ($desayunos as $desayuno)
        <div class="grid-item" data-bs-toggle="modal" data-bs-target="#editModal{{ $desayuno->id }}">
            <img src="{{ asset($desayuno->id_imagen_producto) }}" alt="Imagen de catálogo">
            <div class="grid-item-text">
                <br>
                <center><h5><strong>Nombre:</strong> {{ $desayuno->id_nombre_producto }}</h5></center>
                <center><h6><strong>Descripción:</strong> {{ $desayuno->id_descripcion }}</h6></center>
                <center><h6><strong>Precio:</strong> ${{ number_format($desayuno->id_precio, 0, ',', '.') }}</h6></center>
                <center><h6><strong>Peso:</strong> {{ $desayuno->id_peso }}</h6></center>
                <center><h6><strong>Cat:</strong> {{ $desayuno->id_categoria }}</h6></center>
            </div>
            <form action="{{ route('add') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$desayuno->id}}">
                    <div class="mb-3">
                        <label for="cantidad{{ $desayuno->id }}" class="form-label">Cantidad:</label>
                        <input type="number" name="cantidad" id="cantidad{{ $desayuno->id }}" class="form-control" value="1" min="1">
                    </div>
                    <div class="button-add">
                    <input type="submit" name="btn" class="btn btn-primary w-100" value="Agregar al carrito">
                    </div>
                </form>
        </div>
    @endforeach
    </div>
</div>

<br> 

<h2>Pulpas</h2>
<div class="grid-container">
    @foreach ($pulpas as $pulpa)
        <div class="grid-item" data-bs-toggle="modal" data-bs-target="#editModal{{ $pulpa->id }}">
            <img src="{{ asset($pulpa->id_imagen_producto) }}" alt="Imagen de catálogo">
            <div class="grid-item-text">
                <br>
                <center><h5><strong>Nombre:</strong> {{ $pulpa->id_nombre_producto }}</h5></center>
                <center><h6><strong>Descripción:</strong> {{ $pulpa->id_descripcion }}</h6></center>
                <center><h6><strong>Precio:</strong> ${{ number_format($pulpa->id_precio, 0, ',', '.') }}</h6></center>
                <center><h6><strong>Peso:</strong> {{ $pulpa->id_peso }}</h6></center>
                <center><h6><strong>Cat:</strong> {{ $pulpa->id_categoria }}</h6></center>
            </div>
            <form action="{{ route('add') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$pulpa->id}}">
                    <div class="mb-3">
                        <label for="cantidad{{ $pulpa->id }}" class="form-label">Cantidad:</label>
                        <input type="number" name="cantidad" id="cantidad{{ $pulpa->id }}" class="form-control" value="1" min="1">
                    </div>
                    <div class="button-add">
                    <input type="submit" name="btn" class="btn btn-primary w-100" value="Agregar al carrito">
                    </div>
                </form>
        </div>
        @endforeach
    </div>
</div>

<br>

<div>
        <h2>Batidos</h2>
<div class="grid-container">
    @foreach ($batidos as $batido)
        <div class="grid-item" data-bs-toggle="modal" data-bs-target="#editModal{{ $batido->id }}">
        <img src="{{ asset($batido->id_imagen_producto) }}" alt="Imagen de catálogo">
            <div class="grid-item-text">
                <br>
                <center><h5><strong>Nombre:</strong> {{ $batido->id_nombre_producto }}</h5></center>
                <center><h6><strong>Descripción:</strong> {{ $batido->id_descripcion }}</h6></center>
                <center><h6><strong>Precio:</strong> ${{ number_format($batido->id_precio, 0, ',', '.') }}</h6></center>
                <center><h6><strong>Peso:</strong> {{ $batido->id_peso }}</h6></center>
                <center><h6><strong>Cat:</strong> {{ $batido->id_categoria }}</h6></center>
            </div>
            <form action="{{ route('add') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$batido->id}}">
                    <div class="mb-3">
                        <label for="cantidad{{ $batido->id }}" class="form-label">Cantidad:</label>
                        <input type="number" name="cantidad" id="cantidad{{ $batido->id }}" class="form-control" value="1" min="1">
                    </div>
                    <div class="button-add">
                    <input type="submit" name="btn" class="btn btn-primary w-100" value="Agregar al carrito">
                    </div>
                </form>
        </div>
    @endforeach
</div>
</div>

</section>
<!-- Bootstrap JavaScript y Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    
</body>
</html>