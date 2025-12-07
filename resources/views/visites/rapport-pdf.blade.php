<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rapport de visite</title>
    <style>
        /* Base globale compatible DomPDF */
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            color: #0f172a;
            margin: 25px;
        }

        .wrapper {
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            overflow: hidden;
        }

        /* Layout 2 colonnes : bandeau gauche + contenu droit */
        .sidebar {
            float: left;
            width: 26%;
            background-color: #0f172a; /* bleu nuit */
            color: #e5e7eb;
            padding: 18px 14px;
            box-sizing: border-box;
            min-height: 450px;
        }

        .content {
            float: right;
            width: 74%;
            background-color: #f9fafb;
            padding: 18px 18px;
            box-sizing: border-box;
            min-height: 450px;
        }

        .clearfix {
            clear: both;
        }

        h1 {
            font-size: 18px;
            margin: 0 0 6px 0;
        }

        h2 {
            font-size: 13px;
            margin: 0 0 6px 0;
        }

        .subtitle {
            font-size: 10px;
            color: #9ca3af;
        }

        .sidebar-section {
            margin-top: 18px;
        }

        .sidebar-label {
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: #9ca3af;
            margin-bottom: 4px;
        }

        .sidebar-value {
            font-size: 11px;
            font-weight: bold;
            color: #e5e7eb;
        }

        .chip {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 999px;
            font-size: 9px;
            font-weight: bold;
            margin-top: 6px;
        }

        .chip-en-cours {
            background-color: #22c55e33;
            color: #a7f3d0;
            border: 1px solid #22c55e;
        }

        .chip-terminee {
            background-color: #0ea5e933;
            color: #bae6fd;
            border: 1px solid #0ea5e9;
        }

        .section {
            margin-bottom: 14px;
        }

        .section-title {
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.16em;
            color: #6b7280;
            margin-bottom: 6px;
        }

        .card {
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            background-color: #ffffff;
            padding: 9px 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 5px 6px;
            font-size: 10px;
            text-align: left;
        }

        th {
            color: #6b7280;
            width: 35%;
        }

        .value-strong {
            font-weight: bold;
            color: #111827;
        }

        .muted {
            color: #6b7280;
        }

        .footer {
            margin-top: 10px;
            font-size: 8px;
            color: #9ca3af;
            border-top: 1px solid #e5e7eb;
            padding-top: 6px;
        }
    </style>
</head>
<body>

@php
    $arrivee = $visite->heure_arrivee ? \Carbon\Carbon::parse($visite->heure_arrivee) : null;
    $depart  = $visite->heure_depart  ? \Carbon\Carbon::parse($visite->heure_depart)  : null;
    $duree   = null;

    if ($arrivee && $depart) {
        $diffMinutes = $depart->diffInMinutes($arrivee);
        $heures = intdiv($diffMinutes, 60);
        $minutes = $diffMinutes % 60;
        $duree = ($heures > 0 ? $heures.' h ' : '').$minutes.' min';
    }

    $dateRapport = now()->format('d/m/Y H:i');
@endphp

<div class="wrapper">

    {{-- BANDEAU LATÉRAL GAUCHE --}}
    <div class="sidebar">
        {{-- Logo si tu en as un --}}
        {{-- <img src="{{ public_path('images/logo.png') }}" style="height:40px; margin-bottom:10px;"> --}}

        <h1>Rapport de visite</h1>
        <p class="subtitle">ID visite : #{{ $visite->id }}</p>
        <p class="subtitle">Généré le : {{ $dateRapport }}</p>

        <div class="sidebar-section">
            <div class="sidebar-label">Statut</div>
            @if($visite->statut === 'en_cours')
                <span class="chip chip-en-cours">EN COURS</span>
            @else
                <span class="chip chip-terminee">TERMINÉE</span>
            @endif
        </div>

        <div class="sidebar-section">
            <div class="sidebar-label">Visiteur</div>
            <div class="sidebar-value">{{ $visite->nom_visiteur }}</div>
        </div>

        <div class="sidebar-section">
            <div class="sidebar-label">Entreprise</div>
            <div class="sidebar-value">
                {{ $visite->entreprise ?? '—' }}
            </div>
        </div>

        <div class="sidebar-section">
            <div class="sidebar-label">Personne rencontrée</div>
            <div class="sidebar-value">
                {{ $visite->personne_rencontree ?? '—' }}
            </div>
        </div>

        <div class="sidebar-section">
            <div class="sidebar-label">Durée estimée</div>
            <div class="sidebar-value">
                {{ $duree ?? '—' }}
            </div>
        </div>
    </div>

    {{-- CONTENU PRINCIPAL DROIT --}}
    <div class="content">

        {{-- Section informations visiteur --}}
        <div class="section">
            <div class="section-title">Informations visiteur</div>
            <div class="card">
                <table>
                    <tr>
                        <th>Nom du visiteur</th>
                        <td class="value-strong">{{ $visite->nom_visiteur }}</td>
                    </tr>
                    <tr>
                        <th>Entreprise</th>
                        <td>{{ $visite->entreprise ?? '—' }}</td>
                    </tr>
                    <tr>
                        <th>Personne rencontrée</th>
                        <td>{{ $visite->personne_rencontree ?? '—' }}</td>
                    </tr>
                </table>
            </div>
        </div>

        {{-- Section déroulement --}}
        <div class="section">
            <div class="section-title">Déroulement de la visite</div>
            <div class="card">
                <table>
                    <tr>
                        <th>Motif de la visite</th>
                        <td>{{ $visite->motif ?? '—' }}</td>
                    </tr>
                    <tr>
                        <th>Heure d'arrivée</th>
                        <td>{{ $visite->heure_arrivee ?? '—' }}</td>
                    </tr>
                    <tr>
                        <th>Heure de départ</th>
                        <td>{{ $visite->heure_depart ?? '—' }}</td>
                    </tr>
                    <tr>
                        <th>Durée est.</th>
                        <td>{{ $duree ?? '—' }}</td>
                    </tr>
                </table>
            </div>
        </div>

        {{-- Section suivi --}}
        <div class="section">
            <div class="section-title">Suivi</div>
            <div class="card">
                <table>
                    <tr>
                        <th>Créée le</th>
                        <td>{{ $visite->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Dernière mise à jour</th>
                        <td>{{ $visite->updated_at }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="footer">
            Rapport généré automatiquement par le module de gestion des visites.
            Document confidentiel, usage interne uniquement.
        </div>
    </div>

    <div class="clearfix"></div>
</div>

</body>
</html>
