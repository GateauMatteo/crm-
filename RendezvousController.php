<?php

namespace App\Http\Controllers;

use App\Models\Rdv;
use Illuminate\Http\Request;

class RendezvousController extends Controller
{
    /**
     * Affiche la liste des rendez-vous.
     */
    public function index()
{
    $rdv = Rdv::all(); // Récupère tous les rendez-vous
    return view('Rdv.index', compact('rdv')); // Charge la vue index avec les rendez-vous
}


    /**
     * Affiche le formulaire pour créer un nouveau rendez-vous.
     */
    public function create()
    {
        return view('Rdv.create');
    }

    /**
     * Stocke un nouveau rendez-vous dans la base de données.
     */
    public function store(Request $request)
    {
        // Valide les données du formulaire
        $request->validate([
            'Nom' => 'required|string|max:150',
            'Prenom' => 'required|string|max:150',
            'Mail' => 'required|email|max:150',
            'Naissance' => 'required|date',
            'Message' => 'required|string|max:500',
        ]);

        // Crée un nouveau rendez-vous
        Rdv::create($request->all());

        // Redirige vers la liste des rendez-vous avec un message de succès
        return redirect()->route('Rendezvous.index')->with('success', 'Rendez-vous créé avec succès!');
    }

    /**
     * Affiche un rendez-vous spécifique.
     */
    public function show(Request $request)
    {
        // Récupère l'ID du rendez-vous à afficher
        $id = $request->input('id');
        $rdv = Rdv::findOrFail($id);
        return view('Rdv.show', compact('rdv'));
    }

    /**
     * Affiche le formulaire pour éditer un rendez-vous spécifique.
     */
    public function edit(Rdv $rdv)
    {
        // Retournez la vue `Rdv.edit` avec l'objet `rdv`
        return view('Rdv.edit', compact('rdv'));
    }
    

    /**
     * Met à jour un rendez-vous dans la base de données.
     */
    public function update(Request $request, Rdv $rdv)
{
    // Valide les données du formulaire
    $validatedData = $request->validate([
        'Nom' => 'required|string|max:255',
        'Prenom' => 'required|string|max:255',
        'Mail' => 'required|email|max:255',
        'Naissance' => 'required|date',
        'Message' => 'required|string|max:500',
    ]);

    // Met à jour le rendez-vous
    $rdv->update($validatedData);

    // Redirige vers la liste des rendez-vous avec un message de succès
    return redirect()->route('Rdv.index')->with('success', 'Rendez-vous mis à jour avec succès!');
}


    /**
     * Supprime un rendez-vous spécifique.
     */
    public function destroy($Idrdv)
    {
        // Trouve le rendez-vous par ID
        $rdv = Rdv::findOrFail($Idrdv);
        
        // Supprime le rendez-vous
        $rdv->delete();
    
        // Redirige vers la liste des rendez-vous avec un message de succès
        return redirect()->route('Rendezvous.index')->with('success', 'Rendez-vous supprimé avec succès!');
    }
    
}
