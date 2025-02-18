<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-straight/css/uicons-regular-straight.css">
    <style>
        /* Asegúrate de que los iconos sean visibles */
        .fi {
            font-size: 20px;
        }
    </style>
</head>
<body class="vh-100" style="background: linear-gradient(to bottom, #007BFF, #00D2D3);">
    
    <div class="todo" style="align-items:center; display:flex; justify-content:center; background:white; padding:10px; margin:20px 80px; border-radius:20px;">
        <div style="padding-top:20px;width:90%; padding-bottom:60px">

            <div>
                <h3>Lista de Inventario</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre Corto</th>
                            <th>Descripción</th>
                            <th>Serie</th>
                            <th>Color</th>
                            <th>Fecha Adquisición</th>
                            <th>Observaciones</th>
                            <th>Área</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nombrecorto }}</td>
                                <td>{{ $item->descripcion }}</td>
                                <td>{{ $item->serie }}</td>
                                <td>{{ $item->color }}</td>
                                <td>{{ $item->fechaadquisicion }}</td>
                                <td>{{ $item->observaciones }}</td>
                                <td>{{ $item->area->nombre }}</td>
                                <td style="width: 100px; ">
                                    <!-- Botón de Editar -->
                                    <a href="{{ route('products.edit', $item->id) }}" class="btn btn-warning">
                                        <i class="fi fi-rr-edit"></i> Editar
                                    </a>
                                    
                                    <!-- Formulario para Eliminar -->
                                    <form action="{{ route('products.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fi fi-rr-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Botón de Agregar Producto -->
                <div class="text-end mt-3">
                    <a href="{{ route('products.create') }}" class="btn btn-success btn-lg">
                        <i class="fi fi-rr-add"></i> Agregar Producto
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
