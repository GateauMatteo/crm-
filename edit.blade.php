@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier le rendez-vous</h2>
    <form action="{{ route('produits.update', $produit->IdProd) }}" method="POST">
        @csrf
        @method('PATCH')
                    <div class="mb-2">
                        <label for="NomProd" class="block text-gray-700 text-sm font-bold mb-2">Nom du produit:</label>
                        <input type="text" name="NomProd" id="NomProd" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $produit->NomProd }}" required>

                    </div>

                 

                    <div class="mb-4">
                        <label for="Prix" class="block text-gray-700 text-sm font-bold mb-2">Prix:</label>
                        <input type="number" name="Prix" id=Prix" class="form-input rounded-md shadow-sm mt-1 block w-full"value="{{$produit->Prix}}" required>
                    </div>
                  
                    <div class="mb-4">
                        <label for="DescProd" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                        <textarea name="DescProd" id="DescProd" rows="3" class="form-textarea rounded-md shadow-sm mt-1 block w-full" value="{{$produit->DescProd}}" required></textarea>
                    </div>

        
        <!-- Ajoutez un bouton de soumission -->
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>
@endsection
