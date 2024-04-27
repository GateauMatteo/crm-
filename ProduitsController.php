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
             'IdProd' => 'required|integer|min:1|max:9999999999', // Maximum de 10 caractères pour un entier
             'NomProd' => 'required|string|max:50',
             'Prix' => 'required|numeric|min:0|max:9999999999', // Maximum de 10 caractères pour un entier
             'DescProd' => 'required|string|max:150',
         ]);
     
         $produits = new Produit([
             'IdProd' => $request->input('IdProd'),
             'NomProd' => $request->input('NomProd'),
             'PrixProd' => $request->input('Prix'),
             'DescProd' => $request->input('DescProd'),
         ]);
     
         $produits->save();
     
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $produit)
    {
        $produits = Produit::all();
        return view('produits.create', compact('produits'));
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
