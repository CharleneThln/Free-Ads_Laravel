@extends('layouts.app')

@section('title', 'Accueil ')

@section('recherche')
<form class="form-inline my-2 my-lg-0" method="GET">
    <input class="form-control mr-sm-2" type="search" placeholder="Recherche" name="recherche" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Find</button>
</form>
<div class="showallads">
    <a href="/" class="bouton"><button type="button" class="btn btn-primary" style="background-color:white;color:black;" id="showallads">Show all Ads</button></a>
</div>
@endsection

@section('filters')
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav auto">

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Filtrer les annonces
                        </a>

                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('home') }}?order=publication">
                                Par date de publication
                            </a>
                            <a class="dropdown-item" href="{{ route('home') }}?order=ascPrice">
                                Par prix croissant
                            </a>
                            <a class="dropdown-item" href="{{ route('home') }}?order=descPrice">
                                Par prix décroissant
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav auto">

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Rechercher par catégorie
                        </a>

                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('home') }}?category=services">
                                Services
                            </a>
                            <a class="dropdown-item" href="{{ route('home') }}?category=vehicules">
                                Véhicules
                            </a>
                            <a class="dropdown-item" href="{{ route('home') }}?category=jouets">
                                Jeux/jouets
                            </a>
                            <a class="dropdown-item" href="{{ route('home') }}?category=filmslivres">
                                Films/Livres
                            </a>
                            <a class="dropdown-item" href="{{ route('home') }}?category=informatique">
                                Informatique
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endsection

@section('content')
<div class="container">

    <div class="row justify-content-center">
        @foreach($ads as $ad)
            <div class="col-3">
                <article class="card">
                    <header class="card-header">
                        <h2><a href="ads/{{$ad->id}}/">{{ $ad->title }}</a></h2>
                    </header>
                    <div class="card-body">
                        <p><img src="{{ $ad->image }}" height="100px"></p>
                        <p>{!! $ad->slug !!}</p> <!-- { et !!, ça interprète les balises HMTL -->
                        <p>{{ $ad->price }}€</p>
                        <p><a href="ads/{{$ad->id}}/">En savoir plus</a></p>
                    </div>
                    <footer class="card-footer">
                        <p>by <em>{{ $ad->nickname }}</em> from {{ $ad->location }}</p>
                        <p><strong>{{ $ad->name }}</strong></p>
                        <p>{{ $ad->created_at }}</p> <!-- cf mise en forme de dates PHP -->
                    </footer>
                </article>
            </div>
        @endforeach

        <!--<div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>-->
    </div>
</div>
@endsection
