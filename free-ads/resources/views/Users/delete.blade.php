@extends('layouts.app')

@section('title', 'Delete User - ')

@section('content')

<script>
    $(document).ready(function(){

        $("#delete").click(function(e){

            var name = '{{$user->name}}';
            resultat = confirm("Are you shure you want to delete " + name + " ?");
            if (resultat == false) {
                e.preventDefault();
            } else {
                alert("The user '" + name + "'' has been deleted." );
            }
        });

    })
</script>

@endsection
