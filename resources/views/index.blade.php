@extends('plantilla.plantilla')
@section('titulo')
Tienda Amazon
@endsection
@section('cabecera')
AmazonPrime
@endsection
@section('contenido')
<div class="text-center mt-3">
<a href="{{route('articulos.index')}}" class='btn btn-primary mr-4'>Articulos Prime</a>
<a href="{{route('vendedores.index')}}" class='btn btn-primary mr-4'>Vendedores Prime</a>
<a href="{{route('categorias.index')}}" class='btn btn-primary mr-4'>Categorias Prime</a>
</div>
@endsection