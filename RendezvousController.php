<?php

// app/Http/Controllers/RendezvousController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\Rdv;


class RendezvousController extends Controller
{
    public function index()
    {
         $rdv = Rdv::all();
            return view('rdv.index', compact('rdv'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rdv = Rdv::all();
        return view('rdv.create', compact('rdv'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nom' => 'required|string|max:150',
            'Prenom' => 'required|string|max:150',
            'Message' => 'required|string|max:150',
            'Mail' => 'required|email|max:150', // Validation pour les adresses email
            'Naissance' => 'required|date' // Validation de la date de naissance
        ]);
        
    
        $rdv = new Rdv([
            'Nom' => $request->input('Nom'),
            'Prenom' => $request->input('Prenom'),
            'Message' => $request->input('Message'),
            'Mail' => $request->input('Mail'),
            'Naissance' => $request->input('Naissance'),
        ]);
    
        $rdv->save();
    
        return redirect()->route('Rdv.index')->with('success', 'Rendez-vous ajouté avec succès!');
    }
    
   /**
    * Display the specified resource.
    */

public function destroy(Rdv $Rdv)
    {
        $Rdv->delete();

        return redirect()->route('Rdv.index')->with('success', 'Rendez-Vous supprimé avec succès!');
    }
    
    public function update(Request $request, $id)
    {
        // Valide les données de la requête
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email',
            'naissance' => 'required|date',
            'message' => 'required|string',
        ]);
    
        // Trouve le rendez-vous à mettre à jour
        $rendezvous = Rdv::findOrFail($id);
    
        // Met à jour les champs avec les valeurs fournies dans la requête
        $rendezvous->nom = $request->input('nom');
        $rendezvous->prenom = $request->input('prenom');
        $rendezvous->email = $request->input('email');
        $rendezvous->naissance = $request->input('naissance');
        $rendezvous->message = $request->input('message');
    
        // Sauvegarde les modifications
        $rendezvous->save();
    
        // Redirige l'utilisateur vers l'index des rendez-vous avec un message de succès
        return redirect()->route('Rdv.index')->with('success', 'Rendez-vous mis à jour avec succès.');
    }
    
    


    public function show($id)
{
    $rendezvous = Rdv::findOrFail($id);
    return view('Rdv.show', compact('rendezvous'));
}

public function edit($id)
{
    // Trouve le rendez-vous à l'aide de l'ID
    $rendezvous = Rdv::findOrFail($id);
    
    // Retourne la vue 'Rdv.edit' avec le rendez-vous
    return view('Rdv.edit', compact('rendezvous'));
}


    
    public function envoyerRendezvous(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'nom' => 'required|string|',
            'prenom' => 'required|string|',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
            'naissance' => 'required|date',
        ]);

        // Enregistrez les données dans la base de données
        DB::table('rdv')->insert([
            'Nom' => $request->nom,
            'Prenom' => $request->prenom,
            'email' => $request->email,
            'Message' => $request->message,
            'Naissance' => $request->naissance,
        ]);

        // Introduire un délai (par exemple, 3 secondes)
        sleep(3);

        // Envoyer un e-mail via Formspree
        $this->envoyerMailFormspree($request->nom, $request->prenom, $request->email, $request->message, $request->naissance);

        // Répondre avec une réponse JSON (peut être étendu selon les besoins)
        return response()->json(['message' => 'Rendez-vous enregistré avec succès']);
    }

    private function envoyerMailFormspree($nom, $prenom, $email, $naissance, $message)

    {
        $response = Http::post('https://formspree.io/f/xaygrgnp', [
            'Nom' => $nom,
            'Prenom' => $prenom,
            'email' => $email,
            'naissance' => $naissance,
            'Message' => $message,
        ]);

        // Vérifiez la réponse si nécessaire
        // $response->status(); 

        // Vous pouvez également ajouter des vérifications supplémentaires ici si nécessaire
    }
}