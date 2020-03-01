@extends('plantilla.plantilla')
@section('titulo')
Categorias Prime
@endsection
@section('cabecera')
<h1 align="center">CATEGORIAS PRIME</h1>
@endsection
@section('contenido')
@if($text=Session::get('mensaje'))
<p class="alert alert-primary my-3">{{$text}}</p>
@endif
<a href="{{route('categorias.create')}}" class="btn btn-info mb-3"> Crear Categoria Prime</a>
<table class="table table-sm table-dark table-bordered">

    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col" class="align-middle">Nombre De La Categoria</th>
        <th scope="col" class="align-middle">Acciones</th>
      </tr>
    </thead>

    <tbody>
        @foreach($categorias as $categoria)

      <tr class="align-middle">
      <td class="align-middle">{{$categoria->id}}</td>
      <td class="align-middle">{{$categoria->nombreCat}}</td>
     
       <td class="align-middle" style="white-space: :nowrap">
          <form class="form-inline" name="del" action="{{route('categorias.destroy', $categoria)}}" method='POST'>
            @method("DELETE")
            @csrf
            <button type="submit" onclick="return confirm('¿Borrar Categoria Prime?')" class="btn btn-danger">Borrar Categoria</button>
            <a href="{{route('categorias.edit', $categoria)}}" class="ml-2 btn btn-warning">Editar Categoria</a>
          </form>  
      </td>   
      </tr>
      @endforeach
    </tbody>
  </table>
  {{$categorias->links()}}
  
@endsection