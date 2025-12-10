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
        $client =client::find(2); // À adapter selon le client connecté
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

   
    public function index(Request $request)
    {
        // Récupérer les clients pour le dropdown
        $clients = client::orderBy('nom')->get();
        
        // Initialiser la requête
        $query = Visite::query();
        
        // Filtrer par client
        if ($request->filled('client_id')) {
            $query->where('client_id', $request->client_id);
        }
        
        // Filtrer par date de début
        if ($request->filled('date_debut')) {
            $query->whereDate('created_at', '>=', $request->date_debut);
        }
        
        // Filtrer par date de fin
        if ($request->filled('date_fin')) {
            $query->whereDate('created_at', '<=', $request->date_fin);
        }
        
        // Filtrer par motif
        if ($request->filled('motif')) {
            $query->where('motif', $request->motif);
        }
        
        // Filtrer par personne rencontrée
        if ($request->filled('personne_rencontree')) {
            $query->where('personne_rencontree', 'LIKE', '%' . $request->personne_rencontree . '%');
        }
        
        // Paginer les résultats
        $visites = $query->orderByDesc('created_at')->paginate(5);
        
        return view('visites.historique', compact('visites', 'clients'));
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



