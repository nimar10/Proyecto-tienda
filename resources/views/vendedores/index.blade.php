@extends('plantilla.plantilla')
@section('titulo')
Vendedores Prime
@endsection
@section('cabecera')
<h1 align="center">VENDEDORES PRIME</h1>
@endsection
@section('contenido')
@if($text=Session::get('mensaje'))
<p class="alert alert-primary my-3">{{$text}}</p>
@endif
<a href="{{route('vendedores.create')}}" class="btn btn-info mb-3"> Contratar Vendedores Prime</a>

<table class="table table-sm table-dark table-bordered">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col" class="align-middle">Nombre</th>
        <th scope="col" class="align-middle">Apellidos</th>
        <th scope="col" class="align-middle">Salario</th>
        <th scope="col" class="align-middle">E-Mail</th>
        <th scope="col" class="align-middle">Imagen</th>
        <th scope="col" class="align-middle">Acciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach($vendedore as $vendedor)
      <tr class="align-middle">
       
      <td class="align-middle">{{$vendedor->id}}</td>
      <td class="align-middle">{{$vendedor->nombre}}</td>
      <td class="align-middle">{{$vendedor->apellidos}}</td>
      <td class="align-middle">{{$vendedor->salario." €"}}</td>
      <td class="align-middle">{{$vendedor->mail}}</td>
      <td class="align-middle">
      <img src="{{asset($vendedor->foto)}}" width='80px' height='80px' class="img-fluid rounded-circle">
        </td> 
       <td class="align-middle" style="white-space: :nowrap">
          <form class="form-inline" name="del" action="{{route('vendedores.destroy', $vendedor)}}" method='POST'>
            @method("DELETE")
            @csrf
            <button type="submit" onclick="return confirm('¿Borrar Vendedor Prime?')" class="btn btn-danger">Borrar</button>
            <a href="{{route('vendedores.edit', $vendedor)}}" class="ml-2 btn btn-warning">Editar Vendedor</a>
          </form>  
      </td>   
      </tr>
      @endforeach
    </tbody>
  </table>
  {{$vendedore->appends(Request::except('page'))->links()}}
  
@endsection