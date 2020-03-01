<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Articulo;

class ArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        Articulo::create([
            'nombre'=>'Camiseta',
            'marca'=>'Jack&Jones',
            'precio'=>'25',
            'descripcion'=>'la camiseta es muy bonita, bienn!!!',
            'categoria_id'=>1
        ]);

        Articulo::create([
            'nombre'=>'Chandal',
            'marca'=>'Adidas',
            'precio'=>'72',
            'descripcion'=>'Chandal oficial del UD Almeria',
            'categoria_id'=>1
            
        ]);

        Articulo::create([
            'nombre'=>'Vaqueros',
            'marca'=>'Pull&Bear',
            'precio'=>'20',
            'descripcion'=>'Aprovechan que se lo llevan de las manos',
            'categoria_id'=>1
            
        ]);

        Articulo::create([
            'nombre'=>'Fifa20',
            'marca'=>'Game',
            'precio'=>'70',
            'descripcion'=>'Juego simulador de futbol',
            'categoria_id'=>2

        ]);

        Articulo::create([
            'nombre'=>'Iphone 11 Pro',
            'marca'=>'Apple',
            'precio'=>'1200',
            'descripcion'=>'Nueva generacion de Apple ya disponible',
            'categoria_id'=>3
            
        ]);

        Articulo::create([
            'nombre'=>'Yatekomo',
            'marca'=>'Gallina Blanca',
            'precio'=>'1.50',
            'descripcion'=>'Alimento hecho con agua y pasta',
            'categoria_id'=>4
            
        ]);
    }
}
