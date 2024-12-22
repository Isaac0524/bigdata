<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats de la recherche</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            flex-direction: column;
            height: 100vh;
            background-color: #f4f4f9;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            padding: 10px;
            width: 100%;
            background-color: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .header h1 {
            margin-bottom: 10px;
        }
        .header a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }
        .content {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            width: 80%;
            max-width: 1200px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-top: 20px; /* Espacement entre le header et le contenu */
        }
        .map-container {
            flex: 1;
            margin-right: 20px;
            height: 300px;
            background-color: #e0e0e0;
            border-radius: 8px;
        }
        .map-container iframe {
            width: 100%;
            height: 100%;
            border-radius: 8px;
        }
        .results {
            flex: 1;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Résultats pour : "{{ $query }}"</h1>
        <a href="{{ url('/') }}">Retour à la page d'accueil</a>
    </div>

    <div class="content">
        <!-- Carte -->
        <div class="map-container">
            <iframe 
                src="https://www.google.com/maps?q={{ urlencode($query) }}&hl=fr&z=10" 
                frameborder="0" 
                style="border:0" 
                allowfullscreen=""
                loading="lazy">
            </iframe>
        </div>

        <!-- Résultats de la recherche -->
        <div class="results">
            @if ($weathers->isNotEmpty())
                <table>
                    <thead>
                        <tr>
                            <th>Région</th>
                            <th>Pays</th>
                            <th>État</th>
                            <th>Ville</th>
                            <th>Température Moyenne (°C)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($weathers as $weather)
                            <tr>
                                <td>{{ $weather->region }}</td>
                                <td>{{ $weather->country }}</td>
                                <td>{{ $weather->state }}</td>
                                <td>{{ $weather->city }}</td>
                                <td>{{ number_format($weather->avg_temperature_celsius, 2) }} °C</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Aucun résultat trouvé.</p>
            @endif
        </div>
    </div>
</body>
</html>
