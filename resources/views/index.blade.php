@extends('layouts.template')
@section('title')
Les Ferrys
@endsection

@section('content')

<h1>Les ferries</h1>

<style>
    h1 {
        margin-bottom: 30px; /* Ajoute une marge en haut du titre */
    }

    body {
        margin: 0;
        padding: 0;
        height: 100vh;
        background-size: cover;
        background-position: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        font-family: sans-serif;
    }


</style>

<table class="table" color="blue">
    <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">En savoir plus</th>
            <th scope="col">Supprimer</th>
            <th scope="col">Modifier</th>
        </tr>
    </thead>

    <tbody>
        @foreach($ferrys as $ferry)
        <tr>
            <td> {{$ferry->nom}} </td>
            <td>
                <a href={{route('ferry.show' , $ferry->id)}}>
                    <button type="button" class="btn btn-primary">Voir bateau</button>
                </a>
            </td>
            <td>
                <form action="{{route('ferry.destroy', $ferry->id)}}" method="POST">
                    @csrf
                    @method ('DELETE')
                    <button class="btn btn-danger" type="submit"> Supprimer </button>
                </form>
            </td>
            <td>
                <a href={{route('ferry.edit', $ferry->id)}}>
                    <button type="button" class="btn btn-warning">Modifier</button>
                </a>
            </td>
        </tr>
        @endforeach

        <tr>
            <td>
                <a href={{route('ferry.create', $ferry->id)}}>
                    <button type="button" class="btn btn-primary">Ajouter</button>
                </a>
            </td>
            <td>
                <a href="{{route('pdf')}}" class="btn btn-outline-danger">Générer PDF</a>
            </td>
        </tr>
    </tbody>
</table>

<div class="d-flex">
    {!! $ferrys->links()!!}
</div>

@endsection
