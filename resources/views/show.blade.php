@extends('layouts.template')
@section('title')
Information du bateau
@endsection


@section('content')

<div class="card">
    <header class="card-header">
        <img src = "../images/{{$ferry->photo}}">
        <div class ="card-content">
        <div class="content">
            <p>Nom du bateau : 
                {{$ferry->nom}}</p>
            <p>Longueur : 
            {{$ferry->longueur}}</p>
            <p>Largeur : 
            {{$ferry->largeur}}</p>
            <p>Vitesse : 
                {{$ferry->vitesse}}</p>

            <h4>Liste des équipements</h4>
            @foreach($equipement as $equipements)
                <p>{{$equipements->libelle}}</p>
            @endforeach
            </div>
            </div>
        <div class="d-flex justify-content-center mt-4">
            <a class="btn btn-info" href="{{url()->previous()}}">Retour</a>
        </div>

@endsection