@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('Mycss.css') }}">
@section('title', 'My infos - ')

@section('content')
<div class=container>
    <div class="row">
        <div class="col" style="margin-bottom:20px;">
            <div class="row">
                <div class="col-6">
                    <a href="/" class="bouton"><button type="button" class="btn btn-primary" style="background-color:grey;border:none;">Back to Home</button></a>
                    <a href="/ads" class="bouton"><button type="button" class="btn btn-primary" style="background-color:purple;border:none;">Back to Dashboard</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class=container-fluid>
    <div class="row justify-content-center">
        <h2>My infos</h2>
    </div>
    <div class="row">
        <div class="col">
            <table class="userinfo" style="text-align:center" >
            
                <tr>
                    <th>#</th> 
                    <td>{{ Auth::user()->id }}</td>
                </tr>
                <tr>
                    <th>Name</th>  
                    <td>{{ Auth::user()->name }}</td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td>{{ Auth::user()->password }}</td>     
                </tr>
                <tr>
                    <th>Email</th>    
                    <td>{{ Auth::user()->email }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ Auth::user()->phone }}</td>
                </tr>
                <tr>
                    <th>Nickname</th>                     
                    <td>{{ Auth::user()->nickname }}</td>
                </tr>      
            
            </table>
        </div> 
    </div>
</div>
<div class=container>
    <div class="row" style="margin-top:20px;">
        <div class="col-6">
        </div>
        <div class="col-6" style="text-align:center;">
            <a href="/Users/edit" class="bouton"><button type="button" class="btn btn-primary" style="background-color:rgb(0, 132, 255);border:none;">Edit my infos</button></a>
            <a href="/Users/delete/{{ Auth::user()->id }}" class="bouton"><button type="button" class="btn btn-primary" style="background-color:rgb(255, 30, 30);border:none;" >Delete my count</button></a>
        </div>
    </div>
</div>
@endsection

