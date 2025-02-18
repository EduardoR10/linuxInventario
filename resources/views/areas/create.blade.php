<!-- resources/views/areas/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Agregar Nueva Área</h2>
    <form action="{{ route('areas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

        <div class="mb-3">
            <label for="ubicacion" class="form-label">Ubicación</label>
            <input type="text" class="form-control" id="ubicacion" name="ubicacion" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('areas.index') }}" class="btn btn-danger">Cancelar</a>
    </form>
</div>
@endsection
