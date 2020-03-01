@extends('plantilla.plantilla')
@section('titulo')
Articulos Amazon
@endsection
@section('cabecera')
CREACION PRIME
@endsection
@section('contenido')
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $miError)
        <li>{{$miError}}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="card bg-secondary">

    <div class="card-header text-center text-white h3">Crear Articulo</div>
    <div class="card-body">
        <form name="g" action="{{route('articulos.store')}}" method='POST' enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="col">
                    <label for="nom" class="col-form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" id="nom" required>
                </div>
                <div class="col">
                    <label for="mar" class="col-form-label">Marca</label>
                    <input type="text" name="marca" class="form-control" placeholder="marca" id="mar" >
                </div>

                <div class="col">
                    <label for="prec" class="col-form-label">Precio</label>
                    <input type="text" name="precio" class="form-control" placeholder="precio" required>
                </div>


            </div>
            <div class="form-row mt-3">
                <div class="col">
                    <label for="text-area" class="col-form-label">Descripcion</label>
                    <input type="text-area" name="descripcion" class="form-control" placeholder="descripcion" required>
                </div>
                <div class="col">
                    <label for="cat" class="col-form-label">Categoria</label>
                    <input type="number" name="categoria_id" class="form-control" placeholder="categoria" required>
                </div>
                <div class="col">
                    <label for="foto" class="col-form-label">Foto</label>
                    <input type="file" name="foto" class="form-control" accept="image/*">
                </div>
            </div>
            <div class="form-row mt-3">
                <div class="col">
                    <input type="submit" value="Crear" class="btn btn-success mr-3">
                    <input type="reset" value="Limpiar" class="btn btn-warning mr-3">
                    <a href="{{route('articulos.index')}}" class="btn btn-info">Volver Articulos</a>

        </form>
    </div>
</div>
@endsection