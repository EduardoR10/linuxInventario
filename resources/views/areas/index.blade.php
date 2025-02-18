<!-- resources/views/areas/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Lista de Áreas</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Ubicación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($areas as $area)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $area->nombre }}</td>
                <td>{{ $area->ubicacion }}</td>
                <td>
                    <a href="{{ route('areas.edit', $area->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('areas.destroy', $area->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-end mt-3">
        <a href="{{ route('areas.create') }}" class="btn btn-success">Agregar Área</a>
    </div>
</div>
@endsection