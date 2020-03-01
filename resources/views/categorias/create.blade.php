@extends('plantilla.plantilla')
@section('titulo')
Categorias Amazon
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

    <div class="card-header text-center text-white h3">Crear Categoria</div>
    <div class="card-body">
        <form name="g" action="{{route('categorias.store')}}" method='POST'>
            @csrf
            <div class="form-row">
                <div class="col">
                    <label for="nom" class="col-form-label">Nombre de la Categoria</label>
                    <input type="text" class="form-control" name="nombreCat" placeholder="nombreCat" id="nom" required>
                </div>
               
            </div>
            
            <div class="form-row mt-3">
                <div class="col">
                    <input type="submit" value="Crear" class="btn btn-success mr-3">
                    <input type="reset" value="Limpiar" class="btn btn-warning mr-3">
                    <a href="{{route('categorias.index')}}" class="btn btn-info">Volver a Categorias</a>
        </form>
    </div>
</div>
@endsection