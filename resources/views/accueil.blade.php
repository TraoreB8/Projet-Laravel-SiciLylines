@extends('layouts.template')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="resources/css/style.css" rel="stylesheet">  
  <title>Accueil</title>


  <h1 style="font-size:74px; font-weight:bold;color:aliceblue;"> Sicile </h1>
  <br>
  <style>
    body {
        margin: 0;
        padding: 0;
        height: 100vh;
        background-image: url('{{ asset("images/Plage-de-Cefalu-au-coucher-du-soleil-en-Sicile.jpg") }}');
        background-size: cover;
        background-position: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .button-container {
        text-align: center;
        margin-top: 20px;
        position: absolute;
        top: 20px;
        right: 20px;
    }

    .btn-success {
        padding: 15px 30px;
        font-size: 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-success:hover {
        background-color: #45a049;
    }
  </style>
</head>


<body>

  <div class="button-container">
    @if (Auth::check())
      <form method="POST" action="{{route('logout')}}">
        @csrf
        <button type="submit" class="btn btn-danger">Déconnexion</button>
      </form>
    @else
      <a href="{{route('login')}}"><button type="button" class="btn btn-success">Se connecter</button></a>
    @endif
  </div>

  <div class="d-flex justify-content-center align-items-center">
    <button type="button" class="btn btn-info">
      <a href="{{route('ferry.index')}}" class="text-white">Accéder aux bateaux</a>
    </button>
  </div>

</body>
</html>
