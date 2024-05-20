@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <h1>Ma Fiche</h1><br>
    @if (isset($message))
        <div class="alert alert-info" role="alert">
            {{ $message }}
        </div>
    @elseif ($fiche)
        @if ($fiche->Remarque == 'accepte')
            <div class="card w-50">
                <span class="alert alert-success">your fiche has been validated successfully</span>
                <div class="card-body">
                    <h2 class="h2 ">{{ $fiche->intitule_pfe }}</h2>
                    <p class="card-text text-xl">Société d'accueil: {{ $fiche->societe_acceuil }}</p><br>
                    <p class="card-text text-xl">Encadrant externe: {{ $fiche->encadrant_externe }}</p><br>
                    <p class="card-text text-xl">Téléphone société: {{ $fiche->ntel_societe }}</p><br>
                    <p class="card-text text-xl">Email société: {{ $fiche->mail_societe }}</p><br>
                    <p class="card-text text-xl">Besions fonctionnels: {{ $fiche->besions_fonctionnels }}</p><br>
                    <p class="card-text text-xl">Technologies utilisées: {{ $fiche->technologies_utilisees }}</p>
                    <p class="card-text text-xl">Langue: {{ $fiche->langue }}</p>
                </div>
            </div>
        @elseif ($fiche->Remarque == 'en attente')
            <div class="alert alert-warning" role="alert">
                Votre fiche n'est pas encore validée.
            </div>
        @elseif ($fiche->Remarque == 'refuse')
            <div class="alert alert-danger" role="alert">
                Votre fiche a été refusée. Vous devez envoyer une fiche valide.
            </div>
        @else
            <div class="alert alert-info" role="alert">
                Statut de la fiche inconnu.
            </div>
        @endif
    @else
        <div class="alert alert-info" role="alert">
            Aucune fiche trouvée.
        </div>
    @endif
</div>
@endsection
