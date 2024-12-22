<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weather;

class WeatherController extends Controller
{
    public function search(Request $request)
    {
        // Validation de l'input
        $request->validate([
            'query' => 'required|string|max:255',
        ]);

        // Récupérer l'input utilisateur
        $query = $request->input('query');

        // Recherche dans la base de données
        $results = Weather::where('country', 'LIKE', "%$query%")
            ->orWhere('city', 'LIKE', "%$query%")
            ->orWhere('state', 'LIKE', "%$query%")
            ->get();

        // Vérifier si aucun résultat
        if ($results->isEmpty()) {
            return view('welcome')->with('error', 'Aucun résultat trouvé.');
        }

        // Conversion des températures Fahrenheit -> Celsius
        foreach ($results as $weather) {
            $weather->avg_temperature_celsius = ($weather->avg_temperature - 32) * 5 / 9;
        }

        // Retourner la vue 'result' avec les résultats
        return view('result', [
            'weathers' => $results,
            'query' => $query,
        ]);
    }
}
