@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
     <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.herramientas.create')}}">Nuevo post</a>
    <h1>Listado de post</h1>
@stop

@section('content')
<div>
    <div class="card-header">
        <input wire:model="search" type="text" class="form-control" placeholder="Ingrese la herramienta o maquina">
    </div>
    @if ($posts->count())
   
    <div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>name</th>
                    <th>Cantidad</th>
                    <th>Estado</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->name}}</td>
                    <td>{{$post->amount}}</td>
                    <td>
                        @if($post->use == 1)
                            funcional
                        @elseif($post->use == 2)
                            averiado
                        @else
                            Desconocido
                        @endif
                    </td>
                    <td width="10px"><a class="btn btn-warning" href="{{route('admin.herramientas.edit', $post)}}">Editar</a></td>
                    <td width="10px">
                        <form action="{{route('admin.herramientas.destroy', $post)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div> 
</div>
@else
<div class="card-body">
<strong>No hay ningún registro...</strong>
</div>
@endif
</div>

@stop
