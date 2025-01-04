<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weather;

class WeatherController extends Controller
{
    public function search(Request $request)
    {
        // Validation des entrées utilisateur
        $validated = $request->validate([
            'query' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        // Récupérer l'input utilisateur
        $query = $validated['query'];
        $date = $validated['date'];

        // Extraire jour, mois, et année de la date
        $day = date('d', strtotime($date));
        $month = date('m', strtotime($date));
        $year = date('Y', strtotime($date));

        // Recherche dans la base de données
        $results = Weather::where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('country', 'LIKE', "%$query%")
                    ->orWhere('state', 'LIKE', "%$query%");
            })
            ->where('day', $day)
            ->where('month', $month)
            ->where('year', $year)
            ->get();

        // Vérifier si aucun résultat n'a été trouvé
        if ($results->isEmpty()) {
            return redirect()->back()->with('error', 'Aucun résultat trouvé pour votre recherche.');
        }

        // Conversion des températures Fahrenheit en Celsius
        $results->transform(function ($weather) {
            $weather->avg_temperature_celsius = ($weather->avg_temperature - 32) * 5 / 9;
            return $weather;
        });

        // Retourner la vue 'result' avec les données
        return view('result', [
            'weathers' => $results,
            'query' => $query,
        ]);
    }
}
