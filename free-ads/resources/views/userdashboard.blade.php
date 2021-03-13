@extends('layouts.app')

@section('title', 'Accueil ')


@section('content')
<div class="container-fluid">

    <div class="row justify-content-center">
        <h2>Publiez vos annonces</h2>
    </div>
    <div class="row justify-content-center">
        <p><a href="/ads">Voir, modifier, supprimer les annonces déjà publiées</a></p>
    </div>
    <div class="row justify-content-center">
        <p><a href="/ads/create">Ajouter une nouvelle annonce</a></p>
    </div>
    <div class="row justify-content-center">
        <h2>Votre compte utilisateur</h2>
    </div>
    <div class="row justify-content-center">
        <p><a href="/Users" >Modifiez vos nom/email/mot de passe - Supprimez votre compte</a></p>
    </div>
    <div class="row justify-content-center">
        <a href="/" class="bouton"><button type="button" class="btn btn-primary">Retour aux annonces</button></a>
    </div>
  
</div>
@endsection
