@extends('plantilla.plantilla')
@section('titulo')
Articulos Prime
@endsection
@section('cabecera')
<h1 align="center">ARTICULOS PRIME</h1>
@endsection
@section('contenido')
@if($text=Session::get('mensaje'))
<p class="alert alert-primary my-3">{{$text}}</p>
@endif
<a href="{{route('articulos.create')}}" class="btn btn-info mb-3"> Crear ArticuloPrime</a>

<div class="float-right">
<form name="search" method="get" action="{{route('articulos.index')}}" class="form-inline float-right">
<select name="categoria_id" class="form-control float-right " onchange="this.form.submit()">
      <option value='%'>Todos</option>
      <option value='-1'>Sin Categoria</option>
      @foreach($categorias as $categoria)
        @if($categoria->id==$request->categoria_id)
          <option value='{{$categoria->id}}' selected>{{$categoria->nombreCat}}</option>
        @else
          <option value='{{$categoria->id}}'>{{$categoria->nombreCat}}</option>
        @endif
      @endforeach
    </select>
</div>
<table class="table table-sm table-dark table-bordered">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col" class="align-middle">Nombre</th>
        <th scope="col" class="align-middle">Marca</th>
        <th scope="col" class="align-middle">Precio</th>
        <th scope="col" class="align-middle">Descripcion</th>
        <th scope="col" class="align-middle">Imagen</th>
        <th scope="col" class="align-middle">Categoria</th>
        <th scope="col" class="align-middle">Acciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach($articulos as $articulo)
      <tr class="align-middle">
       
      <td class="align-middle">{{$articulo->id}}</td>
      <td class="align-middle">{{$articulo->nombre}}</td>
      <td class="align-middle">{{$articulo->marca}}</td>
      <td class="align-middle">{{$articulo->precio." €"}}</td>
      <td class="align-middle">{{$articulo->descripcion}}</td>
      <td class="align-middle">
      <img src="{{asset($articulo->foto)}}" width='80px' height='80px' class="img-fluid rounded-circle">
        </td> 
      <td class="align-middle">{{$articulo->categoria->nombreCat}}</td>
       <td class="align-middle" style="white-space: :nowrap">
          <form class="form-inline" name="del" action="{{route('articulos.destroy', $articulo)}}" method='POST'>
            @method("DELETE")
            @csrf
            <button type="submit" onclick="return confirm('¿Borrar Articulo Prime?')" class="btn btn-danger">Borrar</button>
            <a href="{{route('articulos.edit', $articulo)}}" class="ml-2 btn btn-warning">Editar Articulo</a>
          </form>  
      </td>   
      </tr>
      @endforeach
    </tbody>
  </table>
  {{$articulos->appends(Request::except('page'))->links()}}
  
@endsection