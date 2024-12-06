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
            <a class="nav-link" href="<?php echo e(route('checkout')); ?>">Carrito <span class="badge bg-danger"><?php echo e(\Cart::count()); ?></span></a>
        </li>
    </nav>
<section class="section">
    <div class="section-header">
        <h1>Catalogo Jugos y Batidos </h1>
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

        /*Boton agregar al carrito*/ 

        .button-add:hover{
            opacity: 0.7;
        }

    
    </style>

    <div>
        <h2>Jugos</h2>
    <div class="grid-container">
    <?php $__currentLoopData = $jugos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jugo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="grid-item" data-bs-toggle="modal" data-bs-target="#editModal<?php echo e($jugo->id); ?>">
            <img src="<?php echo e(asset($jugo->id_imagen_producto)); ?>" alt="Imagen de catálogo">
            <div class="grid-item-text">
                <br>
                <h5><strong>Nombre:</strong> <?php echo e($jugo->id_nombre_producto); ?></h5>
                <h6><strong>Descripción:</strong> <?php echo e($jugo->id_descripcion); ?></h6>
                <h6><strong>Precio:</strong> $<?php echo e(number_format($jugo->id_precio, 0, ',', '.')); ?></h6>
                <h6><strong>Peso:</strong> <?php echo e($jugo->id_peso); ?></h6>
                <h6><strong>Cat:</strong> <?php echo e($jugo->id_categoria); ?></h6> 
            </div>
            
                <form action="<?php echo e(route('add')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo e($jugo->id); ?>">
                    <div class="mb-3">
                        <label for="cantidad<?php echo e($jugo->id); ?>" class="form-label">Cantidad:</label>
                        <input type="number" name="cantidad" id="cantidad<?php echo e($jugo->id); ?>" class="form-control" value="1" min="1">
                    </div>
                    <div class="button-add">
                    <input type="submit" name="btn" class="btn btn-primary w-100" value="Agregar al carrito">
                    </div>
                </form>
               
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<br>

<div>
        <h2>Desayunos</h2>
        <div class="grid-container">
    <?php $__currentLoopData = $desayunos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $desayuno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="grid-item" data-bs-toggle="modal" data-bs-target="#editModal<?php echo e($desayuno->id); ?>">
            <img src="<?php echo e(asset($desayuno->id_imagen_producto)); ?>" alt="Imagen de catálogo">
            <div class="grid-item-text">
                <br>
                <center><h5><strong>Nombre:</strong> <?php echo e($desayuno->id_nombre_producto); ?></h5></center>
                <center><h6><strong>Descripción:</strong> <?php echo e($desayuno->id_descripcion); ?></h6></center>
                <center><h6><strong>Precio:</strong> $<?php echo e(number_format($desayuno->id_precio, 0, ',', '.')); ?></h6></center>
                <center><h6><strong>Peso:</strong> <?php echo e($desayuno->id_peso); ?></h6></center>
                <center><h6><strong>Cat:</strong> <?php echo e($desayuno->id_categoria); ?></h6></center>
            </div>
            <form action="<?php echo e(route('add')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo e($desayuno->id); ?>">
                    <div class="mb-3">
                        <label for="cantidad<?php echo e($desayuno->id); ?>" class="form-label">Cantidad:</label>
                        <input type="number" name="cantidad" id="cantidad<?php echo e($desayuno->id); ?>" class="form-control" value="1" min="1">
                    </div>
                    <div class="button-add">
                    <input type="submit" name="btn" class="btn btn-primary w-100" value="Agregar al carrito">
                    </div>
                </form>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<br> 

<h2>Pulpas</h2>
<div class="grid-container">
    <?php $__currentLoopData = $pulpas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pulpa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="grid-item" data-bs-toggle="modal" data-bs-target="#editModal<?php echo e($pulpa->id); ?>">
            <img src="<?php echo e(asset($pulpa->id_imagen_producto)); ?>" alt="Imagen de catálogo">
            <div class="grid-item-text">
                <br>
                <center><h5><strong>Nombre:</strong> <?php echo e($pulpa->id_nombre_producto); ?></h5></center>
                <center><h6><strong>Descripción:</strong> <?php echo e($pulpa->id_descripcion); ?></h6></center>
                <center><h6><strong>Precio:</strong> $<?php echo e(number_format($pulpa->id_precio, 0, ',', '.')); ?></h6></center>
                <center><h6><strong>Peso:</strong> <?php echo e($pulpa->id_peso); ?></h6></center>
                <center><h6><strong>Cat:</strong> <?php echo e($pulpa->id_categoria); ?></h6></center>
            </div>
            <form action="<?php echo e(route('add')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo e($pulpa->id); ?>">
                    <div class="mb-3">
                        <label for="cantidad<?php echo e($pulpa->id); ?>" class="form-label">Cantidad:</label>
                        <input type="number" name="cantidad" id="cantidad<?php echo e($pulpa->id); ?>" class="form-control" value="1" min="1">
                    </div>
                    <div class="button-add">
                    <input type="submit" name="btn" class="btn btn-primary w-100" value="Agregar al carrito">
                    </div>
                </form>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<br>

<div>
        <h2>Batidos</h2>
<div class="grid-container">
    <?php $__currentLoopData = $batidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $batido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="grid-item" data-bs-toggle="modal" data-bs-target="#editModal<?php echo e($batido->id); ?>">
        <img src="<?php echo e(asset($batido->id_imagen_producto)); ?>" alt="Imagen de catálogo">
            <div class="grid-item-text">
                <br>
                <center><h5><strong>Nombre:</strong> <?php echo e($batido->id_nombre_producto); ?></h5></center>
                <center><h6><strong>Descripción:</strong> <?php echo e($batido->id_descripcion); ?></h6></center>
                <center><h6><strong>Precio:</strong> $<?php echo e(number_format($batido->id_precio, 0, ',', '.')); ?></h6></center>
                <center><h6><strong>Peso:</strong> <?php echo e($batido->id_peso); ?></h6></center>
                <center><h6><strong>Cat:</strong> <?php echo e($batido->id_categoria); ?></h6></center>
            </div>
            <form action="<?php echo e(route('add')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo e($batido->id); ?>">
                    <div class="mb-3">
                        <label for="cantidad<?php echo e($batido->id); ?>" class="form-label">Cantidad:</label>
                        <input type="number" name="cantidad" id="cantidad<?php echo e($batido->id); ?>" class="form-control" value="1" min="1">
                    </div>
                    <div class="button-add">
                    <input type="submit" name="btn" class="btn btn-primary w-100" value="Agregar al carrito">
                    </div>
                </form>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>

</section>
<!-- Bootstrap JavaScript y Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    
</body>
</html><?php /**PATH C:\xampp\htdocs\viñedoProyect\resources\views/users/index.blade.php ENDPATH**/ ?>