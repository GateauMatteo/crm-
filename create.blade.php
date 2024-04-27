@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-full mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 lg:p-8 bg-white border-b border-gray-200 min-w-full">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Créer un nouveau rendez-vous') }}
                </h2>

                <!-- Formulaire de création de rendez-vous -->
                <form action="{{ route('rendezvous.index) }}" method="POST">
                    @csrf

                    <div class="mb-2">
                        <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Nom du client :</label>
                        <input type="text" name="nom" id="nom" class="form-input rounded-md shadow-sm mt-1 block w-full" placeholder="Entrez le nom du client" required>
                    </div>

                    <div class="mb-2">
                        <label for="prenom" class="block text-gray-700 text-sm font-bold mb-2">Prénom du client :</label>
                        <input type="text" name="prenom" id="prenom" class="form-input rounded-md shadow-sm mt-1 block w-full" placeholder="Entrez le prénom du client" required>
                    </div>

                    <div class="mb-2">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email :</label>
                        <input type="email" name="email" id="email" class="form-input rounded-md shadow-sm mt-1 block w-full" placeholder="Entrez l'email du client" required>
                    </div>

                    <div class="mb-2">
                        <label for="naissance" class="block text-gray-700 text-sm font-bold mb-2">Date de naissance :</label>
                        <input type="date" name="naissance" id="naissance" class="form-input rounded-md shadow-sm mt-1 block w-full" placeholder="Entrez la date de naissance" required>
                    </div>

                    <div class="mb-2">
                        <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Message :</label>
                        <textarea name="message" id="message" rows="4" class="form-textarea rounded-md shadow-sm mt-1 block w-full" placeholder="Entrez le message du client" required></textarea>
                    </div>

                    <button type="submit" class="btn" style="background-color: #3498db; border-radius: 8px; color: white; padding: 8px 15px; text-decoration: none; transition: background-color 0.3s ease-in-out;">
                        Créer le rendez-vous
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
