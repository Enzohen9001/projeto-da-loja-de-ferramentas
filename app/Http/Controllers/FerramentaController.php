<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Ferramenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FerramentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $ferramentas = Ferramenta::All();
    $categorias = Categoria::All();
    return view('ferramentas.index', compact('ferramentas', 'categorias'));
}

/**
 * Show the form for creating a new resource.
 */
public function create()
{
    //Busca as categorias para que a View as use
    $categorias = Categoria::All();

    return view('ferramentas.create', compact('categorias'));
}

/**
 * Store a newly created resource in storage.
 */
public function store(Request $request)
{
    $data = [
        'Nome' => $request->input('title'),
        'title' => $request->input('title'),
        'text' => $request->input('text'),
        'marca' => $request->input('marca'),
        'cor' => $request->input('cor'),
        'voltagem' => $request->input('voltagem'),
        'material' => $request->input('material'),
        'estoque' => $request->input('estoque'),
        'categorias_id' => $request->input('categorias_id')
    ];

    // Processar upload da imagem
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('ferramentas', 'public');
        $data['image'] = $imagePath;
    }

    Ferramenta::create($data);

    return redirect()->route('ferramentas.index');
}


/**
 * Display the specified resource.
 */
public function show(Ferramenta $ferramenta)
{
    //
}

/**
 * Show the form for editing the specified resource.
 */
public function edit(Ferramenta $ferramenta)
{   
    //Busca as categorias para que a View as use
    $categorias = Categoria::All();

    return view('ferramentas.edit', compact('ferramenta', 'categorias'));
}

/**
 * Update the specified resource in storage.
 */
public function update(Request $request, Ferramenta $ferramenta)
{
    $data = [
        'Nome' => $request->input('title'),
        'title' => $request->input('title'),
        'text' => $request->input('text'),
        'marca' => $request->input('marca'),
        'cor' => $request->input('cor'),
        'voltagem' => $request->input('voltagem'),
        'material' => $request->input('material'),
        'estoque' => $request->input('estoque'),
        'categorias_id' => $request->input('categorias_id')
    ];

    // Processar upload da nova imagem
    if ($request->hasFile('image')) {
        // Deletar imagem anterior se existir
        if ($ferramenta->image && Storage::disk('public')->exists($ferramenta->image)) {
            Storage::disk('public')->delete($ferramenta->image);
        }

        // Armazenar nova imagem
        $imagePath = $request->file('image')->store('ferramentas', 'public');
        $data['image'] = $imagePath;
    }

    $ferramenta->update($data);

    return redirect()->route('ferramentas.index');
}

/**
 * Remove the specified resource from storage.
 */
public function destroy(Ferramenta $ferramenta)
{
    $ferramenta->delete();

    return redirect()->route('ferramentas.index');
}
}
