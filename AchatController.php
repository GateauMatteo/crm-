<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use Illuminate\Http\Request;

class AchatController extends Controller
{
    /**
     * Affiche la liste des achats.
     */
    public function index()
    {
        $achats = Achat::all();
        return view('achat.index', compact('achats'));
    }

    /**
     * Affiche le formulaire pour créer un nouvel achat.
     */
    public function create()
    {
        return view('achat.create');
    }

    /**
     * Stocke un nouvel achat dans la base de données.
     */
    public function store(Request $request)
    {
        // Valide les données du formulaire
        $request->validate([
            'PrixTotal' => 'required|numeric',
            'Qte' => 'required|integer',
            'IdLigne' => 'required|integer',
            'IdProd' => 'required|integer',
        ]);

        // Crée un nouvel achat
        Achat::create($request->all());

        // Redirige vers la liste des achats avec un message de succès
        return redirect()->route('achat.index')->with('success', 'Achat créé avec succès!');
    }

    /**
     * Affiche un achat spécifique.
     */
    public function show(Achat $achat)
    {
        return view('achat.show', compact('achat'));
    }

    /**
     * Affiche le formulaire pour éditer un achat spécifique.
     */
    public function edit(Achat $achat)
    {
        return view('achat.edit', compact('achat'));
    }

    /**
     * Met à jour un achat dans la base de données.
     */
    public function update(Request $request, Achat $achat)
    {
        // Valide les données du formulaire
        $request->validate([
            'PrixTotal' => 'required|numeric',
            'Qte' => 'required|integer',
            'IdLigne' => 'required|integer',
            'IdProd' => 'required|integer',
        ]);

        // Met à jour l'achat
        $achat->update($request->all());

        return redirect()->route('achat.index')->with('success', 'Achat mis à jour avec succès!');
    }

    /**
     * Supprime un achat spécifique.
     */
    public function destroy($IDAchat)
    {
        // Trouve le rendez-vous par ID
        $achat = Achat::findOrFail($IDAchat);
        
        // Supprime le rendez-vous
        $achat->delete();
    
        // Redirige vers la liste des rendez-vous avec un message de succès
        return redirect()->route('achat.index')->with('success', 'Rendez-vous supprimé avec succès!');
    }
    
    
    
}
