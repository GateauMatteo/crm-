@extends('layouts.app')

@section('content')
<div class="py-2">
    <div class="max-w-full mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 lg:p-8 bg-white border-b border-gray-200 min-w-full">
                <!-- Titre et lien de création -->
                <div class="flex justify-between items-center mb-6">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Liste des Produits') }}
                    </h2>
                    <a href="{{ route('produits.create') }}" class="btn btn-primary">
                        Créer un nouveau produit
                    </a>
                </div>

                <!-- Tableau des produits -->
                <div class="overflow-x-auto">
                    <table class="w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="py-3 px-6">ID</th>
                                <th class="py-3 px-6">Nom</th>
                                <th class="py-3 px-6">Prix</th>
                                <th class="py-3 px-6">Description</th>
                                
                      
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($produits as $produit)
                            <tr>
                                <td class="px-6 py-4">{{ $produit->IdProd }}</td>
                                <td class="px-6 py-4">{{ $produit->NomProd }}</td>
                                <td class="px-6 py-4">{{ $produit->Prix }}</td>
                                <td class="px-6 py-4">{{ $produit->DescProd }}</td>
                                <td class="px-6 py-4">
                                 <!-- Formulaire de suppression -->
            <form action="{{ route('produits.destroy', $produit->IdProd) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce produit?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </td>
        <td class="px-6 py-4">
        <form action="{{ route('produits.edit', $produit->IdProd) }}" method="GET">
    <button type="submit" class="btn btn-primary">Modifier</button>
</form>

    </tr>
    @endforeach
</tbody>                                      
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
