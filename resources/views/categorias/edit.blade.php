@extends('plantilla.plantilla')
@section('titulo')
Edicion Amazon
@endsection
@section('cabecera')
EDITAR CATEGORIA PRIME
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
    <div class="card-header text-center text-white h3">Editar Categoria Prime</div>
    <div class="card-body">
    <form name="g" action="{{route('categorias.update', $categoria)}}" method='POST'>
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="col">
                <label for="nom" class="col-form-label">Nombre De La Categoria</label>
                <input type="text" class="form-control" name="nombreCat" value="{{$categoria->nombreCat}}" >
            </div>
        </div>

        <div class="form-row mt-3">
            <div class="col">
                <input type="submit" value="Editar" class="btn btn-success mr-3">
            <a href="{{route('categorias.index')}}" class="btn btn-info">Volver a Categorias Prime</a>   

    </form>
    </div>
</div>
@endsection