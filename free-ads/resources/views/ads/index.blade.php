@extends('layouts.app')

@section('title', 'All Ads - ')

@section('recherche')
<form class="form-inline my-2 my-lg-0" method="GET" >
    <input class="form-control mr-sm-2" type="search" placeholder="Recherche" name="recherche" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Find</button>
</form>
<a href="/ads" class="bouton"><button type="button" class="btn btn-primary" style="background-color:white;color:black;">Show all my Ads</button></a>

@endsection


@section('content')
<div class=container style="text-align:right">
    @if ($user->is_admin != 0)
        <h3 style="color:purple;">ADMIN</h3>
    @endif
</div>
<div class=container>
    <div class="row">
        <div class="col" style="margin-bottom:20px;">
            <div class="row">
                <div class="col-6">
                    <a href="/" class="bouton"><button type="button" class="btn btn-primary" style="background-color:grey;border:none;">Back to Home</button></a>
                    <a href="/ads/create" class="bouton"><button type="button" class="btn btn-primary" style="background-color:green;border:none;">Create a new Ad</button></a>
                </div>
                <div class="col-6" style="text-align:right;">
                    <a href="/Users" class="bouton"><button type="button" class="btn btn-primary" style="background-color:purple;border:none;">User Settings</button></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Price</th>
                        <th scope="col">Author</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($ads as $ad)
                    <tr>
                        <th scope="row">{{$ad->id}}</th>
                        <td><a href="/ads/{{$ad->id}}/">{{$ad->title}}</a></td>
                        <td><a href="/ads/{{$ad->id}}/"><img src={{$ad->image}} alt="image-ad" height=60px weight=60px></a></td>
                        <td><a href="/ads/{{$ad->id}}/">{!!$ad->slug!!}</a></td>
                        <td><a href="/ads/{{$ad->id}}/">{{$ad->price}}€</a></td>
                        <td><a href="/ads/{{$ad->id}}/">{{$ad->nickname}}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function(){

        $("#delete").click(function(e){

            var title = '{{$ads[0]->title}}'';
            resultat = confirm("Are you shure you want to delete " + title + " ?");
            if (resultat == false) {
                e.preventDefault();
            } else {
                alert("The ad '" + title + "'' has been deleted." );
            }
        });

    })
</script>
@endsection
