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
            @foreach ($jugos as $jugo)
                <div class="col-xl-3 col-sm-6 col-lg-4">
                    <div class="wsus__product_item">
                        <a class="wsus__pro_link">
                            <img src="{{ asset($jugo->id_imagen_producto) }}" alt="product" class="img-fluid w-100 img_1" />
                            <img src="{{ asset($jugo->id_imagen_producto) }}" alt="product" class="img-fluid w-100 img_2" />
                        </a>
                        <ul class="wsus__single_pro_icon">
                            <li><a href="#" class="open-modal" data-id="{{ $jugo->id }}"
                             data-name="{{ $jugo->id_nombre_producto }}"
                              data-description="{{ $jugo->id_descripcion }}"
                               data-price="{{ number_format($jugo->id_precio, 0, ',', '.') }}"
                                data-category="{{ $jugo->id_categoria }}"
                                 data-img="{{ asset($jugo->id_imagen_producto) }}">
                                 <i class="far fa-eye"></i></a></li>
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category">Jugos seleccionados</a>
                            <a class="wsus__pro_name">{{ $jugo->id_nombre_producto }}</a>
                            <p class="wsus__price">${{ number_format($jugo->id_precio, 0, ',', '.') }}</p>
                            <!-- Formulario para agregar al carrito -->
                            <form action="{{ route('add') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $jugo->id }}">
                                <input type="hidden" name="name" value="{{ $jugo->id_nombre_producto }}">
                                <input type="hidden" name="price" value="{{ $jugo->id_precio }}">
                                <input type="hidden" name="category" value="{{ $jugo->id_categoria }}">
                                <input type="hidden" name="img" value="{{ asset($jugo->id_imagen_producto) }}">
                                <input type="hidden" name="cantidad" value="1"> <!-- Cantidad fija -->
                                <!-- Botón para agregar al carrito -->
                                <input type="submit" class="add_cart" value="Agregar al carrito" style=" border: none;">
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
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
                        
                        <form action="{{ route('add') }}" method="post">
    @csrf
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
            @foreach ($desayunos as $desayuno)
                <div class="col-xl-3 col-sm-6 col-lg-4">
                    <div class="wsus__product_item">
                        <a class="wsus__pro_link">
                            <img src="{{ asset($desayuno->id_imagen_producto) }}" alt="product" class="img-fluid w-100 img_1" />
                            <img src="{{ asset($desayuno->id_imagen_producto) }}" alt="product" class="img-fluid w-100 img_2" />
                        </a>
                        <ul class="wsus__single_pro_icon">
                            <li><a href="#" class="open-modal" data-id="{{ $desayuno->id }}" data-name="{{ $desayuno->id_nombre_producto }}" data-description="{{ $desayuno->id_descripcion }}" data-price="{{ number_format($desayuno->id_precio, 0, ',', '.') }}" data-category="{{ $desayuno->id_categoria }}" data-img="{{ asset($desayuno->id_imagen_producto) }}"><i class="far fa-eye"></i></a></li>
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category">Desayunos seleccionados</a>
                            <a class="wsus__pro_name">{{ $desayuno->id_nombre_producto }}</a>
                            <p class="wsus__price">${{ number_format($desayuno->id_precio, 0, ',', '.') }}</p>
                            <!-- Formulario para agregar al carrito -->
                            <form action="{{ route('add') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $desayuno->id }}">
                                <input type="hidden" name="name" value="{{ $desayuno->id_nombre_producto }}">
                                <input type="hidden" name="price" value="{{ $desayuno->id_precio }}">
                                <input type="hidden" name="category" value="{{ $desayuno->id_categoria }}">
                                <input type="hidden" name="img" value="{{ asset($desayuno->id_imagen_producto) }}">
                                <input type="hidden" name="cantidad" value="1"> <!-- Cantidad fija -->
                                <!-- Botón para agregar al carrito -->
                                <input type="submit" class="add_cart" value="Agregar al carrito" style=" border: none;">
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
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
            @foreach ($pulpas as $pulpa)
                <div class="col-xl-3 col-sm-6 col-lg-4">
                    <div class="wsus__product_item">
                        <a class="wsus__pro_link">
                            <img src="{{ asset($pulpa->id_imagen_producto) }}" alt="product" class="img-fluid w-100 img_1" />
                            <img src="{{ asset($pulpa->id_imagen_producto) }}" alt="product" class="img-fluid w-100 img_2" />
                        </a>
                        <ul class="wsus__single_pro_icon">
                            <li><a href="#" class="open-modal"
                             data-id="{{ $pulpa->id }}" 
                             data-name="{{ $pulpa->id_nombre_producto }}" 
                             data-description="{{ $pulpa->id_descripcion }}" 
                             data-price="{{ number_format($pulpa->id_precio, 0, ',', '.') }}" 
                             data-category="{{ $pulpa->id_categoria }}" 
                             data-img="{{ asset($pulpa->id_imagen_producto) }}">
                             <i class="far fa-eye"></i></a></li>
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category">Pulpas seleccionadas</a>
                            <a class="wsus__pro_name">{{ $pulpa->id_nombre_producto }}</a>
                            <p class="wsus__price">${{ number_format($pulpa->id_precio, 0, ',', '.') }}</p>
                            <!-- Formulario para agregar al carrito -->
                            <form action="{{ route('add') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $pulpa->id }}">
                                <input type="hidden" name="name" value="{{ $pulpa->id_nombre_producto }}">
                                <input type="hidden" name="price" value="{{ $pulpa->id_precio }}">
                                <input type="hidden" name="category" value="{{ $pulpa->id_categoria }}">
                                <input type="hidden" name="img" value="{{ asset($pulpa->id_imagen_producto) }}">
                                <input type="hidden" name="cantidad" value="1"> <!-- Cantidad fija -->
                                <!-- Botón para agregar al carrito -->
                                <input type="submit" class="add_cart" value="Agregar al carrito" style=" border: none;">
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
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
            @foreach ($batidos as $batido)
                <div class="col-xl-3 col-sm-6 col-lg-4">
                    <div class="wsus__product_item">
                        <a class="wsus__pro_link">
                            <img src="{{ asset($batido->id_imagen_producto) }}" alt="product" class="img-fluid w-100 img_1" />
                            <img src="{{ asset($batido->id_imagen_producto) }}" alt="product" class="img-fluid w-100 img_2" />
                        </a>
                        <ul class="wsus__single_pro_icon">
                            <li><a href="#" class="open-modal"
                             data-id="{{ $batido->id }}" 
                             data-name="{{ $batido->id_nombre_producto }}" 
                             data-description="{{ $batido->id_descripcion }}" 
                             data-price="{{ number_format($batido->id_precio, 0, ',', '.') }}" 
                             data-category="{{ $batido->id_categoria }}" 
                             data-img="{{ asset($batido->id_imagen_producto) }}">
                             <i class="far fa-eye"></i></a></li>
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category">Batidos seleccionados</a>
                            <a class="wsus__pro_name">{{ $batido->id_nombre_producto }}</a>
                            <p class="wsus__price">${{ number_format($batido->id_precio, 0, ',', '.') }}</p>
                            <!-- Formulario para agregar al carrito -->
                            <form action="{{ route('add') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $batido->id }}">
                                <input type="hidden" name="name" value="{{ $batido->id_nombre_producto }}">
                                <input type="hidden" name="price" value="{{ $batido->id_precio }}">
                                <input type="hidden" name="category" value="{{ $batido->id_categoria }}">
                                <input type="hidden" name="img" value="{{ asset($batido->id_imagen_producto) }}">
                                <input type="hidden" name="cantidad" value="1"> <!-- Cantidad fija -->
                                <!-- Botón para agregar al carrito -->
                                <input type="submit" class="add_cart" value="Agregar al carrito" style=" border: none;">
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
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

