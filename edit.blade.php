@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h2 class="text-2xl font-semibold mb-4">Modifier le rendez-vous</h2>

    <!-- Formulaire d'édition -->
    <form action="{{ route('Rdv.update', ['id' => $rendezvous->id]) }}" method="POST">

        @csrf
        @method('PUT')

        <!-- Champ Nom -->
        <div class="mb-4">
            <label for="nom" class="block text-gray-700 font-bold">Nom :</label>
            <input type="text" name="nom" id="nom" class="form-input mt-1 block w-full" value="{{ $rendezvous->Nom }}" required>
        </div>

        <!-- Champ Prénom -->
        <div class="mb-4">
            <label for="prenom" class="block text-gray-700 font-bold">Prénom :</label>
            <input type="text" name="prenom" id="prenom" class="form-input mt-1 block w-full" value="{{ $rendezvous->Prenom }}" required>
        </div>

        <!-- Champ Email -->
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold">Email :</label>
            <input type="email" name="email" id="email" class="form-input mt-1 block w-full" value="{{ $rendezvous->Mail }}" required>
        </div>

        <!-- Champ Date de naissance -->
        <div class="mb-4">
            <label for="naissance" class="block text-gray-700 font-bold">Date de naissance :</label>
            <input type="date" name="naissance" id="naissance" class="form-input mt-1 block w-full" value="{{ $rendezvous->Naissance }}" required>
        </div>

        <!-- Champ Message -->
        <div class="mb-4">
            <label for="message" class="block text-gray-700 font-bold">Message :</label>
            <textarea name="message" id="message" rows="3" class="form-textarea mt-1 block w-full" required>{{ $rendezvous->Message }}</textarea>
        </div>

        <!-- Bouton de soumission -->
        <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">
            Mettre à jour le rendez-vous
        </button>
    </form>
</div>
@endsection
