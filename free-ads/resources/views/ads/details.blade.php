@extends('layouts.app')

@section('title', 'Details Ad - ')

@section('content')
<div class=container>
    <div class="row">
        <div class="col-6" style="margin-bottom:20px;">
            <a href="/" class="bouton"><button type="button" class="btn btn-primary" style="background-color:grey;border:none;">Back to Home</button></a>
            <a href="/ads/" class="bouton"><button type="button" class="btn btn-primary" style="background-color:purple;border:none;">Back to Dashboard</button></a>
        </div>
    </div>
</div>
<div class=container>
    <h1>{{$ad->title}}</h1>
    <?php //var_dump($user->id); var_dump($ad->users_id); var_dump($canEdit)?>
    <div class="row contenu">
        <div class="col-4">
            <h4>Location:</h4>
            <p>{!!$ad->location!!}</p>
            <h4>Price:</h4>
            <p>{!!$ad->price!!}€</p>
            <h4>Publication date:</h4>
            <p>{{$ad->created_at}}</p>
        </div>
        <div class="col-4">
            <img src="{{$ad->image}}" height=300px weight=300px alt="Image de {{$ad->title}}" class="imageDetails">
        </div>
        <div class="col-4">
            <h4>Content:</h4>
            <p>{!!$ad->content!!}</p>
        </div>
    </div>
    @if($canEdit)
        <div class="row footer">
            <div class="col">
                <a href="/ads/{{$ad->id}}/edit" class="bouton"><button type="button" class="btn btn-primary" style="background-color:green;border:none;">Edit this Ad</button></a>
                <a href="/ads/{{$ad->id}}/delete" class="bouton"><button type="button" class="btn btn-primary" style="background-color:rgb(255, 30, 30);border:none;">Delete this Ad</button></a>
        </div>
    @endif
</div>

@endsection
