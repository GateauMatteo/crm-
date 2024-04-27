@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-full mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 lg:p-8 bg-white border-b border-gray-200 min-w-full">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Créer un nouvel achat') }}
                </h2>

                <form method="POST" action="{{ route('achat.store') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="PrixTotal" class="block text-sm font-medium text-gray-700">Prix Total:</label>
                        <input type="number" step="0.01" name="PrixTotal" id="PrixTotal" required class="mt-1 block w-full" placeholder="Entrez le prix total de l'achat">
                    </div>

                    <div class="mb-4">
                        <label for="Qte" class="block text-sm font-medium text-gray-700">Quantité:</label>
                        <input type="number" name="Qte" id="Qte" required class="mt-1 block w-full" placeholder="Entrez la quantité">
                    </div>

                    <div class="mb-4">
                        <label for="IdLigne" class="block text-sm font-medium text-gray-700">ID Ligne:</label>
                        <input type="number" name="IdLigne" id="IdLigne" required class="mt-1 block w-full" placeholder="Entrez l'ID de la ligne">
                    </div>

                    <div class="mb-4">
                        <label for="IdProd" class="block text-sm font-medium text-gray-700">ID Produit:</label>
                        <input type="number" name="IdProd" id="IdProd" required class="mt-1 block w-full" placeholder="Entrez l'ID du produit">
                    </div>

                    <button type="submit" class="btn" style="background-color: #3498db; border-radius: 8px; color: white; padding: 8px 15px; text-decoration: none; transition: background-color 0.3s ease-in-out;">
                        Créer l'achat
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
