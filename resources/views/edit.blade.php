@extends('layouts.template')

@section('title')
Modification d'un élève
@endsection



@section('content')
    <form action="{{ route('ferry.update', $ferry->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="nom" class="form-label">Entrez le nom</label>
            <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" id="nom" placeholder="Votre nom" value="{{ old('nom', $ferry->nom)}}">
            @error('nom')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    <div class="mb-3">
        <label for="prenom" class="form-label">Saissisez sa longueur</label>
        <input type="text" class="form-control @error('longueur') is-invalid @enderror" name="longueur" id="longueur" placeholder="La longueur" value="{{ old('longueur') }}">
        @error('longueur')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="largeur" class="form-label">Saissisez sa largeur</label>
        <input type="largeur" class="form-control @error('largeur') is-invalid @enderror" name="largeur" id="largeur" value="{{ old('largeur') }}">
        @error('largeur')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="vitesse" class="form-label">Saissisez sa vitesse</label>
        <input type="vitesse" class="form-control @error('vitesse') is-invalid @enderror" name="vitesse" id="email" placeholder="La vitesse" value="{{ old('vitesse') }}">
        @error('vitesse')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="photo" class="form-label">Téléchargez la photo</label>
        <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" id="photo">
        @error('photo')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>


    <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
@endsection