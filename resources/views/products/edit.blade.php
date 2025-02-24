@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Editar Producto</h2>
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Nombre Corto -->
        <div class="mb-3">
            <label for="nombrecorto" class="form-label">Nombre Corto</label>
            <input type="text" class="form-control" id="nombrecorto" name="nombrecorto" value="{{ $product->NombreCorto }}" required>
        </div>

        <!-- Descripción -->
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $product->Descripcion }}">
        </div>

        <!-- Serie -->
        <div class="mb-3">
            <label for="serie" class="form-label">Serie</label>
            <input type="text" class="form-control" id="serie" name="serie" value="{{ $product->Serie }}">
        </div>

        <!-- Color -->
        <div class="mb-3">
            <label for="color" class="form-label">Color</label>
            <input type="text" class="form-control" id="color" name="color" value="{{ $product->Color }}">
        </div>

        <!-- Fecha de Adquisición -->
        <div class="mb-3">
            <label for="fechaadquisicion" class="form-label">Fecha de Adquisición</label>
            <input type="date" class="form-control" id="fechaadquisicion" name="fechaadquisicion" value="{{ $product->FechaAdquisicion }}">
        </div>

        <!-- Observaciones -->
        <div class="mb-3">
            <label for="observaciones" class="form-label">Observaciones</label>
            <input type="text" class="form-control" id="observaciones" name="observaciones" value="{{ $product->Observaciones }}">
        </div>

        <!-- Tipo de Adquisición -->
        <div class="mb-3">
            <label for="tipoadquisicion" class="form-label
            ">Tipo de Adquisición</label>
            <select class="form-control" id="tipoadquisicion" name="tipoadquisicion" required>
                <option value="Compra" {{ $product->tipoadquisicion == 'Compra' ? 'selected' : '' }}>Compra</option>
                <option value="Donación" {{ $product->tipoadquisicion == 'Donación' ? 'selected' : '' }}>Donación</option>
                <option value="Transferencia" {{ $product->tipoadquisicion == 'Transferencia' ? 'selected' : '' }}>Transferencia</option>
            </select>
        </div>

        <!-- Área -->
        <div class="mb-3">
            <label for="areas_id" class="form-label">Área</label>
            <select class="form-control" id="areas_id" name="areas_id" required>
                @foreach ($areas as $area)
                    <option value="{{ $area->id }}" {{ $product->areas_id == $area->id ? 'selected' : '' }}>
                        {{ $area->Nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('products.index') }}" class="btn btn-danger">Cancelar</a>
    </form>
</div>
@endsection
