@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">Productos</h2>
        </div>
        <div>
            <a href="{{route('productos.create')}}" class="btn btn-primary">Agregar Producto</a>
        </div>
    </div>

    @if (Session::get('success'))
        <div class="alert alert-success mt-5">
            <strong>{{Session::get('success')}}</strong><br><br>
        </div>
    @endif

    <div class="col-12 mt-4 mb-5">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Creado</th>
                <th>Actualizado</th>
                <th>Acciones</th>
            </tr>
            @foreach ($productos as $producto)
                <tr>
                    <td class="fw-bold">{{ $producto->nombre }}</td>
                    <td>{{$producto->precio}}</td>
                    <td>{{$producto->cantidad}}</td>
                    <td>{{$producto->created_at}}</td>
                    <td>{{$producto->updated_at}}</td>
                    <td class="text-center">
                        <a href="{{route('productos.edit', $producto)}}" class="btn btn-warning">Editar</a>

                        <form action="{{route('productos.destroy', $producto)}}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="col-lg-12">
        <form action="{{ route('file.store')}}" method="POST" enctype="multipart/form-data" id="upload-file">
            @csrf
            <div class="row">
                <div class="col0md-12">
                    <div class="form-group">
                        <input type="file" name="nombre" placeholder="Elige un Archivo" id="nombre">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" id="submit">Subir</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>Archivo</th>
                <th>Path</th>
                <th>Accion</th>
            </tr>
            @foreach ($archivos as $archivo)
                <tr>
                    <td class="fw-bold">{{ $archivo->nombre }}</td>
                    <td>{{$archivo->path}}</td>
                    <td class="text-center">
                        <a href="{{ $archivo->path  }}" target="_blank" class="btn btn-success">Descargar</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection