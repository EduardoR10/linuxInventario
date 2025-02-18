<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Area;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Mostrar todos los productos activos
    public function showProducts()
    {
        $products = Product::get();
        return view('products.index', compact('products'));
    }

    // Mostrar formulario para crear un nuevo producto
    public function create()
    {
        $areas = Area::all();  // Obtener todas las áreas
        return view('products.create', compact('areas'));  // Pasar las áreas a la vista
    }

    // Almacenar un nuevo producto
    public function store(Request $request)
    {
        $request->validate([
            'nombrecorto' => 'required|string|max:45',
            'descripcion' => 'nullable|string|max:45',
            'serie' => 'nullable|string|max:45',
            'color' => 'nullable|string|max:45',
            'fechaadquisicion' => 'nullable|string|max:45',
            'observaciones' => 'nullable|string|max:45',
            'areas_id' => 'required|exists:areas,id',  // Validación para área
        ]);

        // Crear el producto con los datos recibidos
        $product = Product::create([
            'nombrecorto' => $request->nombrecorto,
            'descripcion' => $request->descripcion,
            'serie' => $request->serie,
            'color' => $request->color,
            'fechaadquisicion' => $request->fechaadquisicion,
            'observaciones' => $request->observaciones,
            'areas_id' => $request->areas_id,  // Asumimos que el área es un id válido
        ]);

        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }

    // Mostrar formulario para editar un producto
    public function edit(Product $product)
    {
        $areas = Area::all();  // Obtener todas las áreas
        return view('products.edit', compact('product', 'areas'));  // Pasar el producto y las áreas a la vista
    }


    // Actualizar los datos del producto
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nombrecorto' => 'required|string|max:45',
            'descripcion' => 'nullable|string|max:45',
            'serie' => 'nullable|string|max:45',
            'color' => 'nullable|string|max:45',
            'fechaadquisicion' => 'nullable|string|max:45',
            'observaciones' => 'nullable|string|max:45',
            'areas_id' => 'required|exists:areas,id',  // Validación para área
        ]);

        // Actualizar los campos del producto
        $product->update([
            'nombrecorto' => $request->nombrecorto,
            'descripcion' => $request->descripcion,
            'serie' => $request->serie,
            'color' => $request->color,
            'fechaadquisicion' => $request->fechaadquisicion,
            'observaciones' => $request->observaciones,
            'areas_id' => $request->areas_id,  // Mantener el área si se actualiza
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    // Eliminar un producto (eliminación falsa)
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product disabled successfully!');
    }
}
