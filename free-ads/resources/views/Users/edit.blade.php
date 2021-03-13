@extends('layouts.app')

@section('title', 'Edit User - ')

@section('content')


<div class=container-fluid>
    <form method="POST" action="/Users/{{ $user->id }}">
        @csrf
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="insertName">Name</label>
                <input type="text" name="insertName" class="form-control" id="insertName" placeholder="Name" value="{{ Auth::user()->name }}" required>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="insertPassword">Password</label>
                <input type="password" name="insertPassword" class="form-control" id="insertPassword" placeholder="Password" required>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="insertEmail">Email</label>
                <input type="email" name="insertEmail" class="form-control" id="insertEmail" placeholder="Email" value="{{ Auth::user()->email }}" required>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="insertPhone">Phone Number</label>
                <input type="text" name="insertPhoneNumber" class="form-control" id="insertPhoneNumber" placeholder="Phone Number" value="{{ Auth::user()->phone }}" required>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="insertNickname">Nickname</label>
                <input type="text" name="insertNickname" class="form-control" id="insertNickname" placeholder="Nickname"  value="{{ Auth::user()->nickname }}" required>
            </div>
        </div>

        <button class="btn btn-primary" type="submit">Edit my infos</button>
    </form>
</div>
@endsection
