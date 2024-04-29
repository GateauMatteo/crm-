@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h2 class="text-2xl font-semibold mb-4">Modifier l'achat</h2>

    <!-- Formulaire d'édition -->
    <form action="{{ route('achat.update', ['id' => $achat->IDAchat]) }}" method="POST">

        @csrf
        @method('PATCH')

        <!-- Champ Prix Total-->
        <div class="mb-4">
            <label for="nom" class="block text-gray-700 font-bold">Prix Total :</label>
            <input type="number" name="nom" id="nom" class="form-input mt-1 block w-full" value="{{ $achats->PrixTotal }}" required>
        </div>

        <!-- Champ Quantité -->
        <div class="mb-4">
            <label for="Qte" class="block text-gray-700 font-bold">Quantité :</label>
            <input type="number" name="Qte" id="Qte" class="form-input mt-1 block w-full" value="{{ $achats->Qte}}" required>
        </div>

        <!-- Champ IdLigne -->
        <div class="mb-4">
            <label for="IdLigne" class="block text-gray-700 font-bold">IdLigne :</label>
            <input type="number" name="IdLigne" id="IdLigne" class="form-input mt-1 block w-full" value="{{ $achats->IdLigne }}" required>
        </div>

        <!-- Champ Date de naissance -->
        <div class="mb-4">
            <label for="IdProd" class="block text-gray-700 font-bold">Id Produit:</label>
            <input type="number" name="IdProd" id="IdProd" class="form-input mt-1 block w-full" value="{{ $achats->IdProd }}" required>
        </div>

        <!-- Champ Message -->
        <div class="mb-4">
            <label for="message" class="block text-gray-700 font-bold">Message :</label>
            <textarea name="message" id="message" rows="3" class="form-textarea mt-1 block w-full" required>{{ $rendezvous->Message }}</textarea>
        </div>

        <!-- Bouton de soumission -->
        <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">
            Mettre à jour l'achat
        </button>
    </form>
</div>
@endsection
