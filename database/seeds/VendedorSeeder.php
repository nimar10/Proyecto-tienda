<?php

use App\Vendedor;
use Illuminate\Database\Seeder;

class VendedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       

        Vendedor::create([
            'nombre'=>'Fernando',
            'apellidos'=>'Sanchez Lopez',
            'salario'=>'1500',
            'mail'=>'correo1@correo.es'
        ]);

        Vendedor::create([
            'nombre'=>'Agustin',
            'apellidos'=>'Hernandez Sanchez',
            'salario'=>'2500',
            'mail'=>'correo2@correo.es'
        ]);

        Vendedor::create([
            'nombre'=>'Mario',
            'apellidos'=>'Sevilla Garcia',
            'salario'=>'1200',
            'mail'=>'correo3@correo.es'
        ]);

        Vendedor::create([
            'nombre'=>'Jose Antonio',
            'apellidos'=>'Perez Lopez',
            'salario'=>'3200',
            'mail'=>'correo4@correo.es'
        ]);

        Vendedor::create([
            'nombre'=>'Joaquin',
            'apellidos'=>'Sanchez Salmeron',
            'salario'=>'2200',
            'mail'=>'correo5@correo.es'
        ]);

        Vendedor::create([
            'nombre'=>'Pepito',
            'apellidos'=>'Dimitri Vegas',
            'salario'=>'1500',
            'mail'=>'correo6@correo.es'
        ]);


    }
}
