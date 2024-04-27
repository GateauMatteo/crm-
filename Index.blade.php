@extends('layouts.app')

@section('content')
<div class="py-2">
    <div class="max-w-full mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 lg:p-8 bg-white border-b border-gray-200 min-w-full">
                <!-- Titre et lien de création -->
                <div class="flex justify-between items-center mb-6">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Liste des Rdv') }}
                    </h2>
                    <a href="{{ route('Rdv.create') }}" class="btn btn-primary">
                        Créer un nouveau Rdv
                    </a>
                </div>

                <!-- Tableau des produits -->
                <div class="overflow-x-auto">
                    <table class="w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="py-3 px-6">Id</th>
                                <th class="py-3 px-6">Nom</th>
                                <th class="py-3 px-6">Mail</th>
                                <th class="py-3 px-6">Message</th>
                                <th class="py-3 px-6">Prenom</th>
                                <th class="py-3 px-6">Naissance </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($rdv as $rendezvous)
                            <tr>
                                <td class="px-6 py-4">{{ $rendezvous-> Idrdv}}
                                <td class="px-6 py-4">{{ $rendezvous->Nom }}</td>
                                <td class="px-6 py-4">{{ $rendezvous->Mail }}</td>
                                <td class="px-6 py-4">{{ $rendezvous->Message }}</td>
                                <td class="px-6 py-4">{{ $rendezvous->Prenom }}</td>
                                <td class="px-6 py-4">{{$rendezvous->Naissance}} </td>
                                <td class="px-6 py-4">
                                    <!-- Bouton visionner -->
                                    <a class="btn btn-primary" href="{{ route('Rdv.update', ['Rdv' => $rendezvous->Idrdv]) }}">
                                        Modifier
                                    </a>

                                    <!-- Bouton supprimer -->
                                    <form action="{{ route('Rdv.destroy', ['Rdv' => $rendezvous->Idrdv]) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
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
