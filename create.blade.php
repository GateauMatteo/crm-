<!-- achats/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-full mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 lg:p-8 bg-white border-b border-gray-200 min-w-full">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Créer un nouveau produit') }}
                </h2>

                <!-- Votre formulaire de création d'achat ici -->
                <form action="{{ route('produits.index') }}" method="POST">
                    @csrf

                    <div class="mb-2">
                        <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Nom du produit:</label>
                        <input type="text" name="nom" id="NomProd" class="form-input rounded-md shadow-sm mt-1 block w-full" placeholder="Entrez le nom du produit" required>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                        <textarea name="description" id="DescProd" rows="3" class="form-textarea rounded-md shadow-sm mt-1 block w-full" placeholder="Entrez la description du produit" required></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="prix" class="block text-gray-700 text-sm font-bold mb-2">Prix:</label>
                        <input type="number" name="prix" id=Prix" class="form-input rounded-md shadow-sm mt-1 block w-full" placeholder="Entrez le prix du produit" required>
                    </div>
                    <div class="mb-4">
                        <label for="Image" class="block text-gray-700 text-sm font-bold mb-2">Image:</label>
                        <input type="file" name="Image" id="Image" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                    </div>
                   

                    <button type="submit" class="btn" style="background-color: #3498db; border-radius: 8px; color: white; padding: 8px 15px; text-decoration: none; transition: background-color 0.3s ease-in-out;">
                        Créer le produit 
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
