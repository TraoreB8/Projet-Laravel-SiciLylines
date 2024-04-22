<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
        }
        th {
            border: 1px solid black;
            padding: 10px;
            font-weight: bold;
        }
        td {
            border: 1px solid black;
            padding: 5px;
        }
        .ferry-image {
            max-width: 100px; /* Ajustez cette valeur selon vos besoins */
            max-height: 100px; /* Ajustez cette valeur selon vos besoins */
        }
    </style>
</head>
<body>
    <h1>{{$titre}}</h1>
    <h3>Date:{{$date}}</h3>
    <p>
        <table>
            <tr>
                <th>Nom</th>
                <th>Longueur</th>
                <th>Largeur</th>
                <th>Vitesse</th>
                <th>Equipement</th>
                <th>Photo</th>
            </tr>
            @foreach($ferrys as $ferry)
            <tr>
                <td>{{ $ferry->nom }}</td>
                <td>{{ $ferry->longueur }}</td>
                <td>{{ $ferry->largeur }}</td>
                <td>{{ $ferry->vitesse }}</td>
                <td> 
                    @foreach($ferry->equipements as $equipement)
                        {{$equipement->libelle}}
                    @endforeach
                </td>
                <td><img src="../images/{{$ferry->photo}}" class="ferry-image"></td>
            </tr>
            @endforeach
        </table>
    </p>
</body>
</html>
