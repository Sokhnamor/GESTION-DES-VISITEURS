<?php

namespace App\Http\Controllers;

use App\Models\Visite;
use Illuminate\Http\Request;
use App\Models\client;
use Barryvdh\DomPDF\Facade\Pdf;



class VisiteController extends Controller
{
    public function create()
    {
        // return view('visites.enregistrement');
         // On récupère les 5 dernières visites
        $recentVisites = Visite::orderByDesc('created_at')
            ->limit(7)
            ->get();

        return view('visites.enregistrement', compact('recentVisites'));
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
        $client =client::find(1); // À adapter selon le client connecté
        $data['statut'] = 'en_cours';
        $data['heure_depart'] = null;
        // $data['client_id'] = 1; // À adapter selon le client connecté   
        $client ->visites()->create($data);

        // 3) Insertion en base
      

        // 4) Redirection vers le formulaire avec message
        return redirect()
            ->route('visites.create')
            ->with('success', 'Visite enregistrée avec succès.');
    }

   
    public function index()
{
    // 5 visites par page (change le nombre si tu veux)
    $visites = Visite::orderByDesc('created_at')->paginate(5);

    return view('visites.historique', compact('visites'));
}



    public function enregistrerDepart($id)
{
    $visite = Visite::findOrFail($id);

    // Mise à jour du départ
    $visite->update([
        'heure_depart' => now(),
        'statut' => 'terminee'
    ]);

    return back()->with('success', 'Départ enregistré avec succès.');
}
//voir rapport
public function show($id)
{
    $visite = Visite::findOrFail($id);

    return view('visites.rapport', compact('visite'));
}


public function exportPdf($id)
{
    $visite = Visite::findOrFail($id);

    // On utilise une vue spéciale pour le PDF (plus simple, sans JS)
    $pdf = Pdf::loadView('visites.rapport-pdf', compact('visite'));

    // Nom du fichier PDF
    $fileName = 'rapport_visite_'.$visite->id.'.pdf';

    return $pdf->download($fileName);
}

public function parametres()
{
    return view('visites.parametres');
}



}



