@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier le rendez-vous</h2>
    <form action="{{ route('Rendezvous.update', $rdv->Idrdv) }}" method="POST">
        @csrf
        @method('PATCH')
        
        <div class="mb-3">
            <label for="Nom" class="form-label">Nom</label>
            <input type="text" name="Nom" class="form-control" value="{{ $rdv->Nom }}" required>
        </div>
        
        <div class="mb-3">
            <label for="Prenom" class="form-label">Prénom</label>
            <input type="text" name="Prenom" class="form-control" value="{{ $rdv->Prenom }}" required>
        </div>
        
        <div class="mb-3">
            <label for="Mail" class="form-label">Mail</label>
            <input type="email" name="Mail" class="form-control" value="{{ $rdv->Mail }}" required>
        </div>
        
        <div class="mb-3">
            <label for="Naissance" class="form-label">Date de naissance</label>
            <input type="date" name="Naissance" class="form-control" value="{{ $rdv->Naissance }}" required>
        </div>
        
        <div class="mb-3">
            <label for="Message" class="form-label">Message</label>
            <textarea name="Message" class="form-control" required>{{ $rdv->Message }}</textarea>
        </div>
        
        <!-- Ajoutez un bouton de soumission -->
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>
@endsection
