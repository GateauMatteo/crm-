<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $produits = Produit::all();
    return view('produits.index', compact('produits'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produits = Produit::all();
        return view('produits.create', compact('produits'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
   
    
     public function store(Request $request)
{
    $request->validate([
        'IdProd' => 'required|integer',
        'NomProd' => 'required|string|max:50',
        'Prix' => 'required|numeric|min:0|max:9999999999',
        'DescProd' => 'required|string|max:150',
        'Image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Stockage de l'image
    $imagePath = null;
    if ($request->hasFile('Image')) {
        $imagePath = $request->file('Image')->store('images', 'public');
    }

    // Création du produit
    Produit::create([
        'IdProd' => $request->input('IdProd'),
        'NomProd' => $request->input('NomProd'),
        'Prix' => $request->input('Prix'),
        'DescProd' => $request->input('DescProd'),
        'Image' => $imagePath,
    ]);

    return redirect()->route('produits.index')->with('success', 'Produit ajouté avec succès!');
}

     
    /**
     * Display the specified resource.
     */
public function show(Produit $produit)
{
    return view('produits.show', compact('produit'));
}
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit)
    {
        return view('produits.edit', compact('produit'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $produit)
    {
        $request->validate([
            'NomProd' => 'required|string|max:50',
            'Prix' => 'required|numeric|min:0|max:9999999999',
            'DescProd' => 'required|string|max:150',
            'Image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $produit->update($request->all());
    
        return redirect()->route('produits.index')->with('success', 'Produit mis à jour avec succès!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit)
    {
        $produit->delete();
       return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès!');
    }
}
?>
