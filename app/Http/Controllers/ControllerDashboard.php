<?php

namespace App\Http\Controllers;

use App\Models\visite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerDashboard extends Controller
{
    //
    public function index()
    {
        $vistes = $this->getNumbervisiteurActuelJourWeek();
        $visiteursParJour = $this->getNumberVisiteurForEachDayOfWeek();
        //cette variable recupere le nombre de visiteur des 3 derniers mois et les points pour le graphique
        $visiteurThreeLastMonths = $this->getTheThreeLastMonthsVisteur();
        return view('viewDashboardClient', ['visites' => $vistes, 'visiteursParJour' => $visiteursParJour,'visiteurThreeLastMonths'=>$visiteurThreeLastMonths]);
    }

    public function getNumbervisiteurActuelJourWeek()
    {
        $visiteurTotal = visite::count();
        $visiteurActuel = visite::whereDate('created_at', now()->toDateString())->where('statut', 'en_cours')->count();
        //ici je recupere le nombre de visiteur du jour qui ont terminer leur visite
        $visiteurJourFinish = visite::whereDate('created_at', now()->toDateString())->where('statut', 'terminee')->count();
        //ici je recupere le nombre de visiteur d'hier
        $visiteurHier = visite::whereDate('created_at', now()->subDay()->toDateString())->count();
        $visiteurJour = visite::whereDate('created_at', now()->toDateString())->count();
        //ici je recupere le nombre de visteur de la semaine passee
        $visiteurLastWeek = visite::whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()])->count();
        $visiteurWeek = visite::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();
        //ici je calcule le pourcentage pour savoir l'evolution des visiteur du jour entre ce qui sont deja parti et ceux qui sont encore present
        $pourcentageActuel = $visiteurJourFinish > 0 ? (($visiteurActuel - $visiteurJourFinish) / $visiteurActuel) * 100 : 100;
        $pourcentageJour = $visiteurHier > 0 ? (($visiteurJour - $visiteurHier) / $visiteurJour) * 100 : 100;
        $pourcentageWeek = $visiteurLastWeek > 0 ? (($visiteurWeek - $visiteurLastWeek) / $visiteurWeek) * 100 : 100;
        $tauxConversion =$visiteurActuel > 0 ?(($visiteurTotal - $visiteurActuel)/$visiteurTotal) * 100 : 100;

        return [
            'visiteurActuel' => $visiteurActuel,
            'visiteurJour' => $visiteurJour,
            'visiteurWeek' => $visiteurWeek,
            'pourcentageActuel' => round($pourcentageActuel, 2),
            'pourcentageJour' => round($pourcentageJour, 2),
            'pourcentageWeek' => round($pourcentageWeek, 2),
            'tauxConversion' => round($tauxConversion, 2),
        ];
    }
    function getNumberVisiteurForEachDayOfWeek()
    {
        $visiteursParJour = [];
        $joursSemaine = ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'];

        foreach ($joursSemaine as $index => $jour) {
            $date = now()->startOfWeek()->addDays($index);
            $count = visite::whereDate('created_at', $date->toDateString())->count();
            $visiteursParJour[$jour] = $count;
        }

        return $visiteursParJour;
    }

    // cette fonction permet de recuperer le nombre de visiteur des 3 derniers mois et calculer les points pour le graphique
    function getTheThreeLastMonthsVisteur()
    {
        $visitesParMois = [];

        for ($i = 2; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $mois = $date->format('M Y');
            $count = visite::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();
            $visitesParMois[$mois] = $count;
        }
        $avantDernierMois = array_values($visitesParMois)[1]; //avant dernier mois c'est par rapport au 3 derniers mois
        $DernierMois = array_values($visitesParMois)[2];// dernier mois c'est par rapport au 3 derniers mois
        // je calcule le pourcentage d'evolution des visiteur des 3 derniers mois
        $pourcentageTroisMois = $avantDernierMois > 0 ? (($DernierMois - $avantDernierMois) / $avantDernierMois) * 100 : 100;
        $nbMois = count($visitesParMois);
        $largeur = 472;
        $hauteur = 150;
        $max = max($visitesParMois);

        $points = [];
        $i = 0;
        foreach ($visitesParMois as $valeur) {
            $x = ($i / ($nbMois - 1)) * $largeur;
            $y = $hauteur - ($valeur / $max * $hauteur);
            $points[] = round($x) . ',' . round($y);
            $i++;
        }

        $pointsString = implode(' ', $points);


        return ['visitesParMois' => $visitesParMois, 'pointsString' => $pointsString, 'pourcentageTroisMois' => round($pourcentageTroisMois, 2)];
    }
}
