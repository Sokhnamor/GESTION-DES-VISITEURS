<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rapport de visite</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
</head>
<body class="bg-slate-100 min-h-screen flex items-center justify-center">

@php
    use Carbon\Carbon;

    $arrivee = $visite->heure_arrivee ? Carbon::parse($visite->heure_arrivee) : null;
    $depart  = $visite->heure_depart  ? Carbon::parse($visite->heure_depart)  : null;
    $duree   = null;

    if ($arrivee && $depart) {
        $diffMinutes = $depart->diffInMinutes($arrivee);
        $heures = intdiv($diffMinutes, 60);
        $minutes = $diffMinutes % 60;
        $duree = ($heures > 0 ? $heures.' h ' : '').$minutes.' min';
    }
@endphp

<div class="w-full max-w-5xl mx-auto px-4 py-8">
    <div class="bg-white shadow-2xl rounded-3xl overflow-hidden border border-slate-100">

        {{-- Bandeau top --}}
        <div class="flex items-center justify-between px-8 py-5 border-b border-slate-200 bg-slate-50">
            <div>
                <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">
                    Rapport de visite
                </p>
                <h1 class="mt-1 text-2xl font-bold text-slate-900">
                    {{ $visite->nom_visiteur }}
                </h1>
                <p class="text-sm text-slate-500 mt-1">
                    @if($visite->entreprise)
                        {{ $visite->entreprise }}
                    @else
                        Visiteur individuel
                    @endif
                </p>
            </div>

            <div class="text-right space-y-2">
                <div>
                    <span class="text-[11px] text-slate-500">ID visite :</span>
                    <span class="text-sm font-semibold text-slate-800">#{{ $visite->id }}</span>
                </div>
                <div>
                    @if($visite->statut === 'en_cours')
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3 py-1 text-[11px] font-semibold text-emerald-700">
                            <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                            En cours
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-sky-50 px-3 py-1 text-[11px] font-semibold text-sky-700">
                            <span class="h-2 w-2 rounded-full bg-sky-500"></span>
                            Terminée
                        </span>
                    @endif
                </div>
            </div>
        </div>

        {{-- Contenu principal --}}
        <div class="px-8 py-6 space-y-6">

            {{-- Résumé temps --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="rounded-2xl bg-slate-50 px-4 py-3 border border-slate-200">
                    <p class="text-[11px] text-slate-500">Heure d'arrivée</p>
                    <p class="mt-1 text-sm font-semibold text-slate-900">
                        {{ $visite->heure_arrivee ?? '—' }}
                    </p>
                </div>
                <div class="rounded-2xl bg-slate-50 px-4 py-3 border border-slate-200">
                    <p class="text-[11px] text-slate-500">Heure de départ</p>
                    <p class="mt-1 text-sm font-semibold text-slate-900">
                        {{ $visite->heure_depart ?? '—' }}
                    </p>
                </div>
                <div class="rounded-2xl bg-slate-50 px-4 py-3 border border-slate-200">
                    <p class="text-[11px] text-slate-500">Durée de la visite</p>
                    <p class="mt-1 text-sm font-semibold text-slate-900">
                        {{ $duree ?? '—' }}
                    </p>
                </div>
            </div>

            {{-- Bloc infos + détails --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Informations visiteur --}}
                <div class="space-y-2">
                    <h2 class="text-sm font-semibold text-slate-800">
                        Informations visiteur
                    </h2>
                    <div class="rounded-2xl border border-slate-200 bg-white px-4 py-3 space-y-1 text-sm text-slate-700">
                        <p>
                            <span class="text-slate-500 font-medium">Nom :</span>
                            <span class="ml-1">{{ $visite->nom_visiteur }}</span>
                        </p>
                        <p>
                            <span class="text-slate-500 font-medium">Entreprise :</span>
                            <span class="ml-1">{{ $visite->entreprise ?? '—' }}</span>
                        </p>
                        <p>
                            <span class="text-slate-500 font-medium">Personne rencontrée :</span>
                            <span class="ml-1">{{ $visite->personne_rencontree ?? '—' }}</span>
                        </p>
                    </div>
                </div>

                {{-- Détails visite --}}
                <div class="space-y-2">
                    <h2 class="text-sm font-semibold text-slate-800">
                        Détails de la visite
                    </h2>
                    <div class="rounded-2xl border border-slate-200 bg-white px-4 py-3 space-y-1 text-sm text-slate-700">
                        <p>
                            <span class="text-slate-500 font-medium">Motif :</span>
                            <span class="ml-1">{{ $visite->motif ?? '—' }}</span>
                        </p>
                        <p>
                            <span class="text-slate-500 font-medium">Créée le :</span>
                            <span class="ml-1">{{ $visite->created_at }}</span>
                        </p>
                        <p>
                            <span class="text-slate-500 font-medium">Dernière mise à jour :</span>
                            <span class="ml-1">{{ $visite->updated_at }}</span>
                        </p>
                    </div>
                </div>
            </div>

            {{-- Zone “notes” éventuelles (optionnel) --}}
            {{-- 
            <div>
                <h2 class="text-sm font-semibold text-slate-800 mb-1">
                    Notes internes
                </h2>
                <div class="rounded-2xl border border-dashed border-slate-300 bg-slate-50 px-4 py-3 text-[13px] text-slate-500">
                    Aucune note saisie.
                </div>
            </div>
            --}}

        </div>

        {{-- Footer actions --}}
        <div class="px-8 py-4 border-t border-slate-200 bg-slate-50 flex items-center justify-between">
            <a href="{{ route('visites.index') }}"
               class="text-sm text-slate-600 hover:text-slate-900">
                ← Retour à l'historique
            </a>

            <div class="flex gap-2">
                <a href="{{ route('visites.pdf', $visite->id) }}"
                   class="px-4 py-2 text-sm rounded-lg border border-slate-300 text-slate-700 hover:bg-slate-100">
                    Télécharger en PDF
                </a>
                <button
                    onclick="window.print()"
                    class="px-4 py-2 text-sm rounded-lg bg-blue-600 text-white hover:bg-blue-700">
                    Imprimer
                </button>
            </div>
        </div>

    </div>
</div>

</body>
</html>
