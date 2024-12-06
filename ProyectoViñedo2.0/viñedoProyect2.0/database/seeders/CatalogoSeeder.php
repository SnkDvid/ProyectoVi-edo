<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('catalogos')->insert([
            [   
                // Ruta relativa para acceder a través de storage
                'id_imagen_producto' => 'storage/catalogos/Mora.jpg',
                'id_nombre_producto' => 'Jugo de mora',
                'id_descripcion' => 'Delicioso Jugo de mora',
                'id_precio' => '10000',
                'id_peso' => '2lb',
                'id_categoria' => 'jugos',
                'habilitado' => 1
            ],
            [   
                // Ruta relativa para acceder a través de storage
                'id_imagen_producto' => 'storage/catalogos/Mora.jpg',
                'id_nombre_producto' => 'Jugo de mora1',
                'id_descripcion' => 'Delicioso Jugo de mora',
                'id_precio' => '10000',
                'id_peso' => '2lb',
                'id_categoria' => 'jugos',
                'habilitado' => 1
            ],
            [   
                // Ruta relativa para acceder a través de storage
                'id_imagen_producto' => 'storage/catalogos/Mora.jpg',
                'id_nombre_producto' => 'Jugo de mora2',
                'id_descripcion' => 'Delicioso Jugo de mora',
                'id_precio' => '10000',
                'id_peso' => '2lb',
                'id_categoria' => 'jugos',
                'habilitado' => 1
            ],
            [   
                // Ruta relativa para acceder a través de storage
                'id_imagen_producto' => 'storage/catalogos/Mora.jpg',
                'id_nombre_producto' => 'Jugo de mora3',
                'id_descripcion' => 'Delicioso Jugo de mora',
                'id_precio' => '10000',
                'id_peso' => '2lb',
                'id_categoria' => 'jugos',
                'habilitado' => 1
            ],
            [   
                // Ruta relativa para acceder a través de storage
                'id_imagen_producto' => 'storage/catalogos/Mora.jpg',
                'id_nombre_producto' => 'Jugo de mora4',
                'id_descripcion' => 'Delicioso Jugo de mora',
                'id_precio' => '10000',
                'id_peso' => '2lb',
                'id_categoria' => 'jugos',
                'habilitado' => 1
            ],
            [   
                // Ruta relativa para acceder a través de storage
                'id_imagen_producto' => 'storage/catalogos/Mandarina.png',
                'id_nombre_producto' => 'Desayuno de mandarina',
                'id_descripcion' => 'Delicioso Desayuno',
                'id_precio' => '15000',
                'id_peso' => 'nn',
                'id_categoria' => 'desayunos',
                'habilitado' => 1
            ],
            [   
                // Ruta relativa para acceder a través de storage
                'id_imagen_producto' => 'storage/catalogos/Mandarina.png',
                'id_nombre_producto' => 'Desayuno de mandarina1',
                'id_descripcion' => 'Delicioso Desayuno',
                'id_precio' => '15000',
                'id_peso' => 'nn',
                'id_categoria' => 'desayunos',
                'habilitado' => 1
            ],
            [   
                // Ruta relativa para acceder a través de storage
                'id_imagen_producto' => 'storage/catalogos/Mandarina.png',
                'id_nombre_producto' => 'Desayuno de mandarina2',
                'id_descripcion' => 'Delicioso Desayuno',
                'id_precio' => '15000',
                'id_peso' => 'nn',
                'id_categoria' => 'desayunos',
                'habilitado' => 1
            ],
            [   
                // Ruta relativa para acceder a través de storage
                'id_imagen_producto' => 'storage/catalogos/Mandarina.png',
                'id_nombre_producto' => 'Desayuno de mandarina3',
                'id_descripcion' => 'Delicioso Desayuno',
                'id_precio' => '15000',
                'id_peso' => 'nn',
                'id_categoria' => 'desayunos',
                'habilitado' => 1
            ],
            [   
                // Ruta relativa para acceder a través de storage
                'id_imagen_producto' => 'storage/catalogos/Mandarina.png',
                'id_nombre_producto' => 'Desayuno de mandarina4',
                'id_descripcion' => 'Delicioso Desayuno',
                'id_precio' => '15000',
                'id_peso' => 'nn',
                'id_categoria' => 'desayunos',
                'habilitado' => 1
            ],
            [   
                // Ruta relativa para acceder a través de storage
                'id_imagen_producto' => 'storage/catalogos/Durazno.jpg',
                'id_nombre_producto' => 'Pulpa de durazno',
                'id_descripcion' => 'Deliciosa pulpa de durazno',
                'id_precio' => '25000',
                'id_peso' => '2lb',
                'id_categoria' => 'pulpas',
                'habilitado' => 1
            ],
            [   
                // Ruta relativa para acceder a través de storage
                'id_imagen_producto' => 'storage/catalogos/Durazno.jpg',
                'id_nombre_producto' => 'Pulpa de durazno1',
                'id_descripcion' => 'Deliciosa pulpa de durazno',
                'id_precio' => '25000',
                'id_peso' => '2lb',
                'id_categoria' => 'pulpas',
                'habilitado' => 1
            ],
            [   
                // Ruta relativa para acceder a través de storage
                'id_imagen_producto' => 'storage/catalogos/Durazno.jpg',
                'id_nombre_producto' => 'Pulpa de durazno2',
                'id_descripcion' => 'Deliciosa pulpa de durazno',
                'id_precio' => '25000',
                'id_peso' => '2lb',
                'id_categoria' => 'pulpas',
                'habilitado' => 1
            ],
            [   
                // Ruta relativa para acceder a través de storage
                'id_imagen_producto' => 'storage/catalogos/Durazno.jpg',
                'id_nombre_producto' => 'Pulpa de durazno3',
                'id_descripcion' => 'Deliciosa pulpa de durazno',
                'id_precio' => '25000',
                'id_peso' => '2lb',
                'id_categoria' => 'pulpas',
                'habilitado' => 1
            ],
            [   
                // Ruta relativa para acceder a través de storage
                'id_imagen_producto' => 'storage/catalogos/Durazno.jpg',
                'id_nombre_producto' => 'Pulpa de durazno4',
                'id_descripcion' => 'Deliciosa pulpa de durazno',
                'id_precio' => '25000',
                'id_peso' => '2lb',
                'id_categoria' => 'pulpas',
                'habilitado' => 1
            ],
            [   
                // Ruta relativa para acceder a través de storage
                'id_imagen_producto' => 'storage/catalogos/DuraznoB.jpg',
                'id_nombre_producto' => 'batido de melocoton',
                'id_descripcion' => 'Delicioso batido',
                'id_precio' => '7000',
                'id_peso' => 'nn',
                'id_categoria' => 'batidos',
                'habilitado' => 1
            ],
            [   
                // Ruta relativa para acceder a través de storage
                'id_imagen_producto' => 'storage/catalogos/DuraznoB.jpg',
                'id_nombre_producto' => 'batido de melocoton1',
                'id_descripcion' => 'Delicioso batido',
                'id_precio' => '7000',
                'id_peso' => 'nn',
                'id_categoria' => 'batidos',
                'habilitado' => 1
            ],
            [   
                // Ruta relativa para acceder a través de storage
                'id_imagen_producto' => 'storage/catalogos/DuraznoB.jpg',
                'id_nombre_producto' => 'batido de melocoton2',
                'id_descripcion' => 'Delicioso batido',
                'id_precio' => '7000',
                'id_peso' => 'nn',
                'id_categoria' => 'batidos',
                'habilitado' => 1
            ],
            [   
                // Ruta relativa para acceder a través de storage
                'id_imagen_producto' => 'storage/catalogos/DuraznoB.jpg',
                'id_nombre_producto' => 'batido de melocoton3',
                'id_descripcion' => 'Delicioso batido',
                'id_precio' => '7000',
                'id_peso' => 'nn',
                'id_categoria' => 'batidos',
                'habilitado' => 1
            ],
            [   
                // Ruta relativa para acceder a través de storage
                'id_imagen_producto' => 'storage/catalogos/DuraznoB.jpg',
                'id_nombre_producto' => 'batido de melocoton4',
                'id_descripcion' => 'Delicioso batido',
                'id_precio' => '7000',
                'id_peso' => 'nn',
                'id_categoria' => 'batidos',
                'habilitado' => 1
            ],
        ]);
    }
}
