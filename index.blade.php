@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-full mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 lg:p-8 bg-white border-b border-gray-200 min-w-full">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Liste des Achats') }}
                    </h2>
                    
                    <a href="{{ route('achat.create') }}" class="btn" style="background-color: #3498db; border-radius: 8px; color: white; padding: 8px 15px; text-decoration: none; transition: background-color 0.3s ease-in-out;">
                        Créer un nouvel achat
                    </a>
                </div>

                <div class="my-6 overflow-x-auto">
                    <table class="w-full min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="py-3 px-6">ID</th>
                                <th scope="col" class="py-3 px-6">Prix Total</th>
                                <th scope="col" class="py-3 px-6">Quantité</th>
                                <th scope="col" class="py-3 px-6">ID Ligne</th>
                                <th scope="col" class="py-3 px-6">ID Produit</th>
                                <th scope="col" class="py-3 px-6">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($achats as $achat)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $achat->IdAchat }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $achat->PrixTotal }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $achat->Qte }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $achat->IdLigne }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $achat->IdProd }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('achat.show', ['achat' => $achat->IdAchat]) }}" class="btn" style="background-color: #3498db; border-radius: 8px; color: white; padding: 8px 10px; text-decoration: none; transition: background-color 0.3s ease-in-out;">
                                        Voir
                                    </a>

                                    <form action="{{ route('achat.destroy', ['achat' => $achat->IdAchat]) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn" style="background-color: #e74c3c; border-radius: 8px; color: white; padding: 8px 10px; text-decoration: none; transition: background-color 0.3s ease-in-out;">
                                            Supprimer
                                        </button>
                                    </form>
                                </td>
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
