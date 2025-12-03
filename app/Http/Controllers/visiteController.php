<?php

namespace App\Http\Controllers;

use App\Models\Visite;
use Illuminate\Http\Request;

class VisiteController extends Controller
{
    public function create()
    {
        return view('visites.enregistrement');
    }

    public function store(Request $request)
    {
        // 1) Validation simple
        $data = $request->validate([
            'nom_visiteur'        => 'required|string|max:255',
            'entreprise'          => 'nullable|string|max:255',
            'personne_rencontree' => 'nullable|string|max:255',
            'motif'               => 'nullable|string|max:255',
            'heure_arrivee'       => 'nullable|date',
        ]);

        // 2) Par défaut, la visite est "en cours", heure_depart = null
        $data['statut'] = 'en_cours';
        $data['heure_depart'] = null;
        $data['client_id'] = 1; // À adapter selon le client connecté

        // 3) Insertion en base
        Visite::create($data);

        // 4) Redirection vers le formulaire avec message
        return redirect()
            ->route('visites.create')
            ->with('success', 'Visite enregistrée avec succès.');
    }

    public function index()
    {
        // Récupérer toutes les visites, les plus récentes d'abord
        $visites = Visite::orderByDesc('created_at')->get();

        return view('visites.historique', compact('visites'));
    }
}
