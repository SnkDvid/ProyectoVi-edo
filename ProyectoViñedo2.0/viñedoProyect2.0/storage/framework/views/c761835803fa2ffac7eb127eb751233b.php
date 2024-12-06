<section id="wsus__electronic">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="wsus__section_header">
                    <h3 id="jugos">Jugos</h3>
                </div>
            </div>
        </div>
        <div class="row flash_sell_slider">
            <?php $__currentLoopData = $jugos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jugo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-3 col-sm-6 col-lg-4">
                    <div class="wsus__product_item">
                        <a class="wsus__pro_link">
                            <img src="<?php echo e(asset($jugo->id_imagen_producto)); ?>" alt="product" class="img-fluid w-100 img_1" />
                            <img src="<?php echo e(asset($jugo->id_imagen_producto)); ?>" alt="product" class="img-fluid w-100 img_2" />
                        </a>
                        <ul class="wsus__single_pro_icon">
                            <li><a href="#" class="open-modal" data-id="<?php echo e($jugo->id); ?>"
                             data-name="<?php echo e($jugo->id_nombre_producto); ?>"
                              data-description="<?php echo e($jugo->id_descripcion); ?>"
                               data-price="<?php echo e(number_format($jugo->id_precio, 0, ',', '.')); ?>"
                                data-category="<?php echo e($jugo->id_categoria); ?>"
                                 data-img="<?php echo e(asset($jugo->id_imagen_producto)); ?>">
                                 <i class="far fa-eye"></i></a></li>
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category">Jugos seleccionados</a>
                            <a class="wsus__pro_name"><?php echo e($jugo->id_nombre_producto); ?></a>
                            <p class="wsus__price">$<?php echo e(number_format($jugo->id_precio, 0, ',', '.')); ?></p>
                            <!-- Formulario para agregar al carrito -->
                            <form action="<?php echo e(route('add')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($jugo->id); ?>">
                                <input type="hidden" name="name" value="<?php echo e($jugo->id_nombre_producto); ?>">
                                <input type="hidden" name="price" value="<?php echo e($jugo->id_precio); ?>">
                                <input type="hidden" name="category" value="<?php echo e($jugo->id_categoria); ?>">
                                <input type="hidden" name="img" value="<?php echo e(asset($jugo->id_imagen_producto)); ?>">
                                <input type="hidden" name="cantidad" value="1"> <!-- Cantidad fija -->
                                <!-- Botón para agregar al carrito -->
                                <input type="submit" class="add_cart" value="Agregar al carrito" style=" border: none;">
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<section class="product_popup_modal">
    <div class="modal fade" id="modalProduct" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times"></i></button>
                    <div class="row">
                        <div class="col-xl-6 col-12 col-sm-10 col-md-8 col-lg-6 m-auto display">
                            <div class="wsus__quick_view_img">
                                <div class="col-xl-12">
                                    <div class="modal_slider_img">
                                        <img id="modal-img" src="" alt="product" class="img-fluid w-100"><!--aqui si se muestra -->
                                    </div>
                                </div>                                      
                            </div>
                        </div>
                        <div class="col-xl-6 col-12 col-sm-12 col-md-12 col-lg-6">
                        
                        <form action="<?php echo e(route('add')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="id" id="modal-product-id" value="">

    <div class="wsus__pro_details_text">
        <a id="modal-name" class="title"></a>
        <p id="modal-description" class="description"></p>
        <p id="modal-price" class="wsus__price"></p>

        <div class="wsus__quentity">
            <h5>Cantidad: </h5>
            <div class="select_number">
                <label for="cantidad" class="form-label"></label>
                <input type="number" name="cantidad" id="cantidad" class="number_area" min="1" max="100" value="1" />
            </div>
        </div>

        <ul class="wsus__button_area">
            <li><input type="submit" class="add_cart" value="Agregar al carrito"></li>
        </ul>

        <p id="modal-category" class="brand_model"><span>Categoría: </span></p>
    </div>
</form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="wsus__electronic">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="wsus__section_header">
                    <h3>Desayunos</h3>
                </div>
            </div>
        </div>
        <div class="row desayuno_slider">
            <?php $__currentLoopData = $desayunos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $desayuno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-3 col-sm-6 col-lg-4">
                    <div class="wsus__product_item">
                        <a class="wsus__pro_link">
                            <img src="<?php echo e(asset($desayuno->id_imagen_producto)); ?>" alt="product" class="img-fluid w-100 img_1" />
                            <img src="<?php echo e(asset($desayuno->id_imagen_producto)); ?>" alt="product" class="img-fluid w-100 img_2" />
                        </a>
                        <ul class="wsus__single_pro_icon">
                            <li><a href="#" class="open-modal" data-id="<?php echo e($desayuno->id); ?>" data-name="<?php echo e($desayuno->id_nombre_producto); ?>" data-description="<?php echo e($desayuno->id_descripcion); ?>" data-price="<?php echo e(number_format($desayuno->id_precio, 0, ',', '.')); ?>" data-category="<?php echo e($desayuno->id_categoria); ?>" data-img="<?php echo e(asset($desayuno->id_imagen_producto)); ?>"><i class="far fa-eye"></i></a></li>
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category">Desayunos seleccionados</a>
                            <a class="wsus__pro_name"><?php echo e($desayuno->id_nombre_producto); ?></a>
                            <p class="wsus__price">$<?php echo e(number_format($desayuno->id_precio, 0, ',', '.')); ?></p>
                            <!-- Formulario para agregar al carrito -->
                            <form action="<?php echo e(route('add')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($desayuno->id); ?>">
                                <input type="hidden" name="name" value="<?php echo e($desayuno->id_nombre_producto); ?>">
                                <input type="hidden" name="price" value="<?php echo e($desayuno->id_precio); ?>">
                                <input type="hidden" name="category" value="<?php echo e($desayuno->id_categoria); ?>">
                                <input type="hidden" name="img" value="<?php echo e(asset($desayuno->id_imagen_producto)); ?>">
                                <input type="hidden" name="cantidad" value="1"> <!-- Cantidad fija -->
                                <!-- Botón para agregar al carrito -->
                                <input type="submit" class="add_cart" value="Agregar al carrito" style=" border: none;">
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>
</section>

<section id="wsus__electronic">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="wsus__section_header">
                    <h3 id="pulpas">Pulpas</h3>
                </div>
            </div>
        </div>
        <div class="row pulpa_slider">
            <?php $__currentLoopData = $pulpas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pulpa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-3 col-sm-6 col-lg-4">
                    <div class="wsus__product_item">
                        <a class="wsus__pro_link">
                            <img src="<?php echo e(asset($pulpa->id_imagen_producto)); ?>" alt="product" class="img-fluid w-100 img_1" />
                            <img src="<?php echo e(asset($pulpa->id_imagen_producto)); ?>" alt="product" class="img-fluid w-100 img_2" />
                        </a>
                        <ul class="wsus__single_pro_icon">
                            <li><a href="#" class="open-modal"
                             data-id="<?php echo e($pulpa->id); ?>" 
                             data-name="<?php echo e($pulpa->id_nombre_producto); ?>" 
                             data-description="<?php echo e($pulpa->id_descripcion); ?>" 
                             data-price="<?php echo e(number_format($pulpa->id_precio, 0, ',', '.')); ?>" 
                             data-category="<?php echo e($pulpa->id_categoria); ?>" 
                             data-img="<?php echo e(asset($pulpa->id_imagen_producto)); ?>">
                             <i class="far fa-eye"></i></a></li>
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category">Pulpas seleccionadas</a>
                            <a class="wsus__pro_name"><?php echo e($pulpa->id_nombre_producto); ?></a>
                            <p class="wsus__price">$<?php echo e(number_format($pulpa->id_precio, 0, ',', '.')); ?></p>
                            <!-- Formulario para agregar al carrito -->
                            <form action="<?php echo e(route('add')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($pulpa->id); ?>">
                                <input type="hidden" name="name" value="<?php echo e($pulpa->id_nombre_producto); ?>">
                                <input type="hidden" name="price" value="<?php echo e($pulpa->id_precio); ?>">
                                <input type="hidden" name="category" value="<?php echo e($pulpa->id_categoria); ?>">
                                <input type="hidden" name="img" value="<?php echo e(asset($pulpa->id_imagen_producto)); ?>">
                                <input type="hidden" name="cantidad" value="1"> <!-- Cantidad fija -->
                                <!-- Botón para agregar al carrito -->
                                <input type="submit" class="add_cart" value="Agregar al carrito" style=" border: none;">
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<section id="wsus__electronic">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="wsus__section_header">
                    <h3 id="batidos">Batidos</h3>
                </div>
            </div>
        </div>
        <div class="row batido_slider">
            <?php $__currentLoopData = $batidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $batido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-3 col-sm-6 col-lg-4">
                    <div class="wsus__product_item">
                        <a class="wsus__pro_link">
                            <img src="<?php echo e(asset($batido->id_imagen_producto)); ?>" alt="product" class="img-fluid w-100 img_1" />
                            <img src="<?php echo e(asset($batido->id_imagen_producto)); ?>" alt="product" class="img-fluid w-100 img_2" />
                        </a>
                        <ul class="wsus__single_pro_icon">
                            <li><a href="#" class="open-modal"
                             data-id="<?php echo e($batido->id); ?>" 
                             data-name="<?php echo e($batido->id_nombre_producto); ?>" 
                             data-description="<?php echo e($batido->id_descripcion); ?>" 
                             data-price="<?php echo e(number_format($batido->id_precio, 0, ',', '.')); ?>" 
                             data-category="<?php echo e($batido->id_categoria); ?>" 
                             data-img="<?php echo e(asset($batido->id_imagen_producto)); ?>">
                             <i class="far fa-eye"></i></a></li>
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category">Batidos seleccionados</a>
                            <a class="wsus__pro_name"><?php echo e($batido->id_nombre_producto); ?></a>
                            <p class="wsus__price">$<?php echo e(number_format($batido->id_precio, 0, ',', '.')); ?></p>
                            <!-- Formulario para agregar al carrito -->
                            <form action="<?php echo e(route('add')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($batido->id); ?>">
                                <input type="hidden" name="name" value="<?php echo e($batido->id_nombre_producto); ?>">
                                <input type="hidden" name="price" value="<?php echo e($batido->id_precio); ?>">
                                <input type="hidden" name="category" value="<?php echo e($batido->id_categoria); ?>">
                                <input type="hidden" name="img" value="<?php echo e(asset($batido->id_imagen_producto)); ?>">
                                <input type="hidden" name="cantidad" value="1"> <!-- Cantidad fija -->
                                <!-- Botón para agregar al carrito -->
                                <input type="submit" class="add_cart" value="Agregar al carrito" style=" border: none;">
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

    <script>
document.addEventListener('DOMContentLoaded', function () {
    // Array con los sliders que tienen productos
    const sliders = [
        '.flash_sell_slider',
        '.desayuno_slider',
        '.pulpa_slider',
        '.batido_slider'
    ];

    // Iteramos sobre los sliders para agregarles el evento de clic
    sliders.forEach(sliderSelector => {
        const slider = document.querySelector(sliderSelector);
        if (slider) {
            slider.addEventListener('click', function (e) {
                if (e.target.closest('.open-modal')) {
                    e.preventDefault();
                    const button = e.target.closest('.open-modal');
                    abrirModal(button);
                }
            });
        }
    });

    function abrirModal(button) {
    const id = button.getAttribute('data-id');
    const name = button.getAttribute('data-name');
    const description = button.getAttribute('data-description');
    const price = button.getAttribute('data-price');
    const category = button.getAttribute('data-category');
    const img = button.getAttribute('data-img');

    console.log(id, name, description, price, category, img);  // Verifica los datos

    if (id && name && description && price && category && img) {
        document.getElementById('modal-product-id').value = id;
        document.getElementById('modal-name').innerText = 'Nombre: ' + name;
        document.getElementById('modal-description').innerText = 'Descripción: ' + description;
        document.getElementById('modal-price').innerText = 'Precio: $' + price;
        document.getElementById('modal-category').innerText = 'Categoría: ' + category;
        document.getElementById('modal-img').setAttribute('src', img);

        const modal = new bootstrap.Modal(document.getElementById('modalProduct'));
        modal.show();
    } else {
        console.error('Faltan datos en el botón para abrir el modal');
    }
}



});

</script>

<?php /**PATH C:\xampp\htdocs\viñedoProyect\resources\views/frontend/home/home/sections/category-product-slider-one.blade.php ENDPATH**/ ?>