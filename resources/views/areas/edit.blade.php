<!-- resources/views/areas/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Editar Área</h2>
    <form action="{{ route('areas.update', $area->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $area->Nombre }}" required>
        </div>

        <div class="mb-3">
            <label for="ubicacion" class="form-label">Ubicación</label>
            <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="{{ $area->Ubicacion }}" required>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('areas.index') }}" class="btn btn-danger">Cancelar</a>
    </form>
</div>
@endsection
