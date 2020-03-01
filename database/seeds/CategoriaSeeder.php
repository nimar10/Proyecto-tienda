<?php

use Illuminate\Database\Seeder;
use App\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        Categoria::create([
            'nombreCat'=>'Ropa'
        ]);

        Categoria::create([
            'nombreCat'=>'Electrodomesticos'
        ]);

        Categoria::create([
            'nombreCat'=>'Telefonia'
        ]);

        Categoria::create([
            'nombreCat'=>'Alimentos'
        ]);
    }
}
