@extends('plantilla.plantilla')
@section('titulo')
MODIFICACION DEL CONTRATO DEL VENDEDOR
@endsection
@section('cabecera')
MODIFICAR VENDEDORE PRIME
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
    <div class="card-header text-center text-white h3">Modificacion de Vendedores</div>
    <div class="card-body">
    <form name="g" action="{{route('vendedores.update', $vendedore)}}" method='POST' enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="col">
                <label for="nom" class="col-form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="{{$vendedore->nombre}}"   required>
            </div>
            <div class="col">
                <label for="ape" class="col-form-label">Apellidos</label>
                <input type="text" name="apellidos" class="form-control"  value="{{$vendedore->apellidos}}" required>
            </div>

            <div class="col">
                <label for="sal" class="col-form-label">Salario</label>
                <input type="text" name="salario" class="form-control"  value="{{$vendedore->salario}}"  required>
            </div>


        </div>
        <div class="form-row mt-3">
            <div class="col">
                <label for="mal" class="col-form-label">E-Mail</label>
                <input type="mail" name="mail" class="form-control" value="{{$vendedore->mail}}"  required>
            </div>
            <div class="col">
            <img src="{{asset($vendedore->foto)}}" width="40vw" height="40vh" class="rounded-circle mr-3">
            <b>Imagen Prime</b>&nbsp;<input type='file' name='foto' accept="image/*">
            </div>
        </div> 
        <div class="form-row mt-3">
            <div class="col">
                <input type="submit" value="Editar" class="btn btn-success mr-3">
            <a href="{{route('vendedores.index')}}" class="btn btn-info">Volver</a>   

    </form>
    </div>
</div>
@endsection