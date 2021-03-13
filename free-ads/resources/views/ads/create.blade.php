@extends('layouts.app')

@section('title', 'Create Ad - ')

@section('content')
<div class=container-fluid>
    <div class="row">
        <div class="col-2" style="margin-bottom:20px;">
            <a href="/ads/" class="bouton"><button type="button" class="btn btn-primary" style="background-color: grey">Back to Ads</button></a>
        </div>
    </div>
</div>
<div class=container-fluid>
    <form method="POST" action="/ads/">
        @csrf
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="insertTitle">Title</label>
                <input type="text" name="insertTitle" class="form-control" id="insertTitle" placeholder="Title" required>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="insertImage">Image</label>
                <input type="text" name="insertImage" class="form-control" id="insertImage" placeholder="Location Link" required>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="insertCategory">Category</label>
                <p><em>1 = Service, 2 = Jouets, 3 = Véhicules, 4 = Films/Livres, 5 = Informatique</em></p>
                <input type="text" name="insertCategories_id" class="form-control" id="insertCategories_id" placeholder="Services, Véhicules, Jouets..." required>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="insertPrice">Price - €</label>
                <input type="text" name="insertPrice" class="form-control" id="insertPrice" placeholder="Price" required>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="insertLocation">Location</label>
                <input type="text" name="insertLocation" class="form-control" id="insertLocation" placeholder="Location" required>
            </div>
        </div>
        <div class="form-row">
            <div class="col mb-3">
                <label for="insertSlug">Slug</label>
                <textarea name="insertSlug" class="form-control" id="insertSlug" rows="1" required></textarea>
            </div>
        </div>
        <div class="form-row">
            <div class="col mb-3">
                <label for="insertContent">Content</label>
                <textarea name="insertContent" class="form-control" id="insertContent" rows="5" required></textarea>
            </div>
        </div>
        <button class="btn btn-primary" type="submit" style="background-color: green">Add new ad</button>
    </form>
</div>
@endsection
