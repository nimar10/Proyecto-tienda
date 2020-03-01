@extends('plantilla.plantilla')
@section('titulo')
Edicion Amazon
@endsection
@section('cabecera')
EDITAR ARTICULO PRIME
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
    <div class="card-header text-center text-white h3">Editar Articulo</div>
    <div class="card-body">
    <form name="g" action="{{route('articulos.update', $articulo)}}" method='POST' enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="col">
                <label for="nom" class="col-form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="{{$articulo->nombre}}"   required>
            </div>
            <div class="col">
                <label for="mar" class="col-form-label">Marca</label>
                <input type="text" name="marca" class="form-control"  value="{{$articulo->marca}}" required>
            </div>

            <div class="col">
                <label for="prec" class="col-form-label">Precio</label>
                <input type="text" name="precio" class="form-control"  value="{{$articulo->precio}}"  required>
            </div>


        </div>
        <div class="form-row mt-3">
            <div class="col">
                <label for="des" class="col-form-label">Descripcion</label>
                <input type="text-area" name="descripcion" class="form-control" value="{{$articulo->descripcion}}"  required>
            </div>
            <div class="col">
            <img src="{{asset($articulo->foto)}}" width="40vw" height="40vh" class="rounded-circle mr-3">
            <b>Imagen Prime</b>&nbsp;<input type='file' name='foto' accept="image/*">
            </div>
        </div> 
        <div class="form-row mt-3">
            <div class="col">
                <input type="submit" value="Editar" class="btn btn-success mr-3">
            <a href="{{route('articulos.index')}}" class="btn btn-info">Volver Articulos</a>   

    </form>
    </div>
</div>
@endsection