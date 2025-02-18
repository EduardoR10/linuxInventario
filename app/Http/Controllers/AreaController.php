<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    // Mostrar todas las áreas
    public function showAreas()
    {
        // Obtener todas las áreas de la base de datos
        $areas = Area::all();
        return view('areas.index', compact('areas'));
    }

    // Mostrar formulario para crear una nueva área
    public function create()
    {
        return view('areas.create');
    }

    // Almacenar una nueva área
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:45',
            'ubicacion' => 'required|string|max:45',
        ]);

        // Crear la nueva área
        Area::create([
            'nombre' => $request->nombre,
            'ubicacion' => $request->ubicacion,
        ]);

        return redirect()->route('areas.index')->with('success', 'Área agregada correctamente');
    }

    // Mostrar el formulario para editar una área
    public function edit(Area $area)
    {
        return view('areas.edit', compact('area'));
    }

    // Actualizar los datos de una área
    public function update(Request $request, Area $area)
    {
        $request->validate([
            'nombre' => 'required|string|max:45',
            'ubicacion' => 'required|string|max:45',
        ]);

        // Actualizar los campos de la área
        $area->update([
            'nombre' => $request->nombre,
            'ubicacion' => $request->ubicacion,
        ]);

        return redirect()->route('areas.index')->with('success', 'Área actualizada correctamente');
    }

    // Eliminar una área
    public function destroy(Area $area)
    {
        $area->delete();
        return redirect()->route('areas.index')->with('success', 'Área eliminada correctamente');
    }
}
