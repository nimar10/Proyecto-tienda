@extends('plantilla.plantilla')
@section('titulo')
Vendedores Amazon
@endsection
@section('cabecera')
CONTRATO DE VENDEDORES
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

    <div class="card-header text-center text-white h3">Contratar un Vendendor</div>
    <div class="card-body">
        <form name="g" action="{{route('vendedores.store')}}" method='POST' enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="col">
                    <label for="nom" class="col-form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="nombre" id="nom" required>
                </div>
                <div class="col">
                    <label for="ape" class="col-form-label">Apellidos</label>
                    <input type="text" name="apellidos" class="form-control" placeholder="apellidos" id="ape" >
                </div>

                <div class="col">
                    <label for="sal" class="col-form-label">Salario</label>
                    <input type="text" name="salario" class="form-control" placeholder="salario" required>
                </div>


            </div>
            <div class="form-row mt-3">
                <div class="col">
                    <label for="ma" class="col-form-label">E-Mail</label>
                    <input type="mail" name="mail" class="form-control" placeholder="mail" required>
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
                    <a href="{{route('vendedores.index')}}" class="btn btn-info">Volver</a>

        </form>
    </div>
</div>
@endsection