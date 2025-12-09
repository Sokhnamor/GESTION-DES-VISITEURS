<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rapport de visite</title>
    <style>
     
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            color: #0f172a;
            margin: 24px;
            /* background-color: #edf1f5; */
        }

        .page {
            background-color: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 16px 18px 14px 18px;
            box-sizing: border-box;
            box-shadow: 0 0 6px rgba(15, 23, 42, 0.12); /* léger relief */
        }

        .muted {
            color: #6b7280;
        }

        .small {
            font-size: 9px;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .mb-2 { margin-bottom: 8px; }
        .mb-3 { margin-bottom: 12px; }
        .mb-4 { margin-bottom: 16px; }
        .mb-1 { margin-bottom: 4px; }
        .mt-1 { margin-top: 4px; }
        .mt-2 { margin-top: 8px; }

        .badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 999px;
            font-size: 9px;
            font-weight: bold;
        }

        .badge-en-cours {
            background-color: #22c55e1a;
            color: #166534;
            border: 1px solid #16a34a;
        }

        .badge-terminee {
            background-color: #0ea5e91a;
            color: #075985;
            border: 1px solid #0284c7;
        }

  
        .header-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        .header-title {
            font-size: 18px;
            font-weight: bold;
            margin: 0;
            padding: 0;
        }

        .header-subtitle {
            font-size: 10px;
            margin: 2px 0 0 0;
            color: #4b5563;
        }

        .header-meta {
            font-size: 9px;
        }

        .header-accent {
            margin-top: 4px;
            width: 60px;
            height: 2px;
            background: linear-gradient(to right, #0ea5e9, #6366f1);
            border-radius: 999px;
        }

      
        .card {
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            background-color: #ffffff;
            padding: 8px 10px;
            box-sizing: border-box;
        }

        .card-soft {
            background-color: #f9fafb;
        }

        .section-title {
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.14em;
            color: #6b7280;
            margin-bottom: 5px;
        }

       
        .section-title::before {
            content: "";
            display: inline-block;
            width: 4px;
            height: 10px;
            background-color: #0ea5e9;
            margin-right: 6px;
            border-radius: 999px;
        }

      
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            font-size: 10px;
            padding: 4px 6px;
            text-align: left;
            vertical-align: top;
        }

        th {
            color: #6b7280;
            width: 35%;
        }

        tr.striped:nth-child(even) td {
            background-color: #f3f4f6;
        }

        .value-strong {
            font-weight: bold;
            color: #111827;
        }

       
        .summary-grid {
            width: 100%;
        }

        .summary-col {
            width: 33.33%;
            vertical-align: top;
        }

        .summary-label {
            font-size: 9px;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.12em;
        }

        .summary-value {
            font-size: 11px;
            font-weight: bold;
            color: #111827;
            margin-top: 2px;
        }

   
        .two-col {
            width: 100%;
            border-collapse: collapse;
        }

        .two-col-sidebar {
            width: 32%;
            vertical-align: top;
        }

        .two-col-main {
            width: 68%;
            vertical-align: top;
        }

        .two-col-sidebar td,
        .two-col-main td {
            padding-top: 0;
            padding-bottom: 0;
        }

        .sidebar-block {
            margin-bottom: 10px;
        }

        .sidebar-label {
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: #9ca3af;
            margin-bottom: 2px;
        }

        .sidebar-value {
            font-size: 11px;
            font-weight: bold;
            color: #111827;
        }

        .sidebar-note {
            font-size: 9px;
            color: #6b7280;
        }

        
        .footer {
            margin-top: 10px;
            padding-top: 6px;
            border-top: 1px solid #e5e7eb;
            font-size: 8px;
            color: #9ca3af;
            text-align: right;
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

<div class="page">

   
    <table class="header-table">
        <tr>
            <td>
                {{-- Logo optionnel --}}
                {{-- <img src="{{ public_path('images/logo.png') }}" style="height:40px; margin-bottom:4px;"> --}}

                <div class="header-title">Rapport de visite</div>
                <div class="header-accent"></div>
                <div class="header-subtitle">
                    Dossier #{{ $visite->id }}
                    @if($visite->entreprise)
                        – {{ $visite->entreprise }} / {{ $visite->nom_visiteur }}
                    @else
                        – {{ $visite->nom_visiteur }}
                    @endif
                </div>
            </td>
            <td class="text-right header-meta">
                <div>Généré le : <strong>{{ $dateRapport }}</strong></div>
                <div>Module : Gestion des visites</div>
                <div>Usage interne uniquement</div>
                <div class="mt-1">
                    @if($visite->statut === 'en_cours')
                        <span class="badge badge-en-cours">VISITE EN COURS</span>
                    @else
                        <span class="badge badge-terminee">VISITE TERMINÉE</span>
                    @endif
                </div>
            </td>
        </tr>
    </table>

  
    <div class="mb-3">
        <div class="section-title">Résumé de la visite</div>
        <div class="card card-soft">
            <table class="summary-grid">
                <tr>
                    <td class="summary-col">
                        <div class="summary-label">Heure d'arrivée</div>
                        <div class="summary-value">
                            {{ $visite->heure_arrivee ?? '—' }}
                        </div>
                    </td>
                    <td class="summary-col">
                        <div class="summary-label">Heure de départ</div>
                        <div class="summary-value">
                            {{ $visite->heure_depart ?? '—' }}
                        </div>
                    </td>
                    <td class="summary-col">
                        <div class="summary-label">Durée estimée</div>
                        <div class="summary-value">
                            {{ $duree ?? '—' }}
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>


    <table class="two-col">
        <tr>
            {{-- COLONNE GAUCHE : INFOS RAPIDES --}}
            <td class="two-col-sidebar" style="padding-right: 10px;">

                <div class="sidebar-block">
                    <div class="sidebar-label">Visiteur</div>
                    <div class="sidebar-value">{{ $visite->nom_visiteur }}</div>
                    <div class="sidebar-note">
                        @if($visite->entreprise)
                            {{ $visite->entreprise }}
                        @else
                            Visiteur individuel
                        @endif
                    </div>
                </div>

                <div class="sidebar-block">
                    <div class="sidebar-label">Personne rencontrée</div>
                    <div class="sidebar-value">
                        {{ $visite->personne_rencontree ?? '—' }}
                    </div>
                </div>

                <div class="sidebar-block">
                    <div class="sidebar-label">Motif principal</div>
                    <div class="sidebar-note">
                        {{ $visite->motif ?? '—' }}
                    </div>
                </div>

                <div class="sidebar-block">
                    <div class="sidebar-label">Suivi</div>
                    <div class="sidebar-note">
                        Créée le : <strong>{{ $visite->created_at }}</strong><br>
                        Dernière mise à jour : <strong>{{ $visite->updated_at }}</strong>
                    </div>
                </div>

                <div class="sidebar-block">
                    <div class="sidebar-label">Référence interne</div>
                    <div class="sidebar-note">
                        Dossier : VIS-{{ str_pad($visite->id, 5, '0', STR_PAD_LEFT) }}
                    </div>
                </div>

            </td>

            <td class="two-col-main">

                {{-- Détails visiteur --}}
                <div class="mb-3">
                    <div class="section-title">Informations visiteur</div>
                    <div class="card">
                        <table>
                            <tr class="striped">
                                <th>Nom du visiteur</th>
                                <td class="value-strong">{{ $visite->nom_visiteur }}</td>
                            </tr>
                            <tr class="striped">
                                <th>Entreprise</th>
                                <td>{{ $visite->entreprise ?? '—' }}</td>
                            </tr>
                            <tr class="striped">
                                <th>Personne rencontrée</th>
                                <td>{{ $visite->personne_rencontree ?? '—' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                {{-- Déroulement --}}
                <div class="mb-3">
                    <div class="section-title">Déroulement de la visite</div>
                    <div class="card">
                        <table>
                            <tr class="striped">
                                <th>Motif de la visite</th>
                                <td>{{ $visite->motif ?? '—' }}</td>
                            </tr>
                            <tr class="striped">
                                <th>Heure d'arrivée</th>
                                <td>{{ $visite->heure_arrivee ?? '—' }}</td>
                            </tr>
                            <tr class="striped">
                                <th>Heure de départ</th>
                                <td>{{ $visite->heure_depart ?? '—' }}</td>
                            </tr>
                            <tr class="striped">
                                <th>Durée estimée</th>
                                <td>{{ $duree ?? '—' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                {{-- Suivi --}}
                <div class="mb-2">
                    <div class="section-title">Suivi et horodatage</div>
                    <div class="card">
                        <table>
                            <tr class="striped">
                                <th>Créée le</th>
                                <td>{{ $visite->created_at }}</td>
                            </tr>
                            <tr class="striped">
                                <th>Dernière mise à jour</th>
                                <td>{{ $visite->updated_at }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

            </td>
        </tr>
    </table>

    {{-- PIED DE PAGE --}}
    <div class="footer">
        Rapport généré automatiquement par le module de gestion des visites.
        Document confidentiel – diffusion interne uniquement.
    </div>

</div>

</body>
</html>
