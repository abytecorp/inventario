@extends('reportes.ejemplo.layout')

@section('content')
    <h1 class="page-header">Listado de productos</h1>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Material</th>
                <th>Disponible</th>
            </tr>
        </thead>
        <tbody>
            @foreach($materiales as $material)
            <tr>
                <td>{{ $material->id }}</td>
                <td>{{ $material->codigo }}</td>
                <td>{{ $material->descripcion }}</td>
                <td class="text-right">{{ $material->nu_disponible }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    <p>
        <a href="{{ route('materiales.excel') }}" class="btn btn-sm btn-primary">
            Descargar productos en Excel
        </a>
    </p>
@endsection