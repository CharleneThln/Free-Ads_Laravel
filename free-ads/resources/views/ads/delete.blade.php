@extends('layouts.app')

@section('title', 'Delete Ad - ')

@section('content')

<script>
    $(document).ready(function(){

        $("#delete").click(function(e){

            var title = '{{$ad->title}}';
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
