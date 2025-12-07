<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Paramètres - Historique des visites</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
</head>
<body class="bg-slate-100 min-h-screen flex items-center justify-center">

<div class="w-full max-w-5xl mx-auto px-4 py-8">
    <div class="bg-white shadow-2xl rounded-3xl border border-slate-100 overflow-hidden">

        {{-- Header --}}
        <div class="px-8 py-5 border-b border-slate-200 bg-slate-50 flex items-center justify-between">
            <div>
                <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">
                    Paramètres
                </p>
                <h1 class="mt-1 text-xl font-bold text-slate-900">
                    Historique des visites
                </h1>
                <p class="text-sm text-slate-500 mt-1">
                    Configuration générale de l’affichage et du comportement de l’historique des visites.
                </p>
            </div>

            <div class="text-right text-xs text-slate-500">
                <p>Module : <span class="font-semibold text-slate-700">Visiteurs</span></p>
                <p>Version : <span class="font-semibold text-slate-700">1.0</span></p>
            </div>
        </div>

        {{-- Contenu --}}
        <div class="px-8 py-6 space-y-6">

            {{-- Section : Affichage --}}
            <div>
                <h2 class="text-sm font-semibold text-slate-900 mb-1">
                    Affichage de l’historique
                </h2>
                <p class="text-xs text-slate-500 mb-4">
                    Ces paramètres permettront plus tard d’ajuster l’affichage pour les utilisateurs
                    (nombre de lignes, tri par défaut, etc.). Pour l’instant, ils sont en lecture seule.
                </p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">

                    <div class="space-y-1">
                        <label class="text-xs text-slate-500">Nombre de lignes par page</label>
                        <input
                            type="number"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs text-slate-500"
                            value="5"
                            disabled
                        >
                        <p class="text-[11px] text-slate-400">
                            Par défaut, 5 visites sont affichées par page.
                        </p>
                    </div>

                    <div class="space-y-1">
                        <label class="text-xs text-slate-500">Tri par défaut</label>
                        <select
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs text-slate-500"
                            disabled
                        >
                            <option>Plus récentes en premier</option>
                            <option>Plus anciennes en premier</option>
                        </select>
                        <p class="text-[11px] text-slate-400">
                            Actuellement : tri par date de création décroissante.
                        </p>
                    </div>

                    <div class="space-y-1">
                        <label class="text-xs text-slate-500">Colonnes visibles</label>
                        <div class="rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-[11px] text-slate-500">
                            Nom visiteur, Entreprise, Personne rencontrée, Motif, Statut, Actions
                        </div>
                        <p class="text-[11px] text-slate-400">
                            Plus tard, tu pourras activer/désactiver certaines colonnes.
                        </p>
                    </div>

                </div>
            </div>

            {{-- Section : Comportement --}}
            <div class="pt-4 border-t border-slate-200">
                <h2 class="text-sm font-semibold text-slate-900 mb-1">
                    Comportement du module
                </h2>
                <p class="text-xs text-slate-500 mb-4">
                    Zone prévue pour définir des règles métiers : durée maximale d’une visite, statut automatique,
                    règles d’archivage, etc.
                </p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">

                    <div class="space-y-1">
                        <label class="text-xs text-slate-500">Durée maximale recommandée (futur)</label>
                        <input
                            type="text"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs text-slate-500"
                            value="8 heures"
                            disabled
                        >
                        <p class="text-[11px] text-slate-400">
                            Exemple de règle métier : au-delà de cette durée, la visite peut être signalée.
                        </p>
                    </div>

                    <div class="space-y-1">
                        <label class="text-xs text-slate-500">Archivage automatique (futur)</label>
                        <select
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs text-slate-500"
                            disabled
                        >
                            <option>Désactivé</option>
                            <option>Après 30 jours</option>
                            <option>Après 90 jours</option>
                        </select>
                        <p class="text-[11px] text-slate-400">
                            Plus tard, tu pourras définir des règles d’archivage automatique.
                        </p>
                    </div>

                </div>
            </div>

        </div>

        {{-- Footer --}}
        <div class="px-8 py-4 border-t border-slate-200 bg-slate-50 flex items-center justify-between">
            <a href="{{ route('visites.index') }}"
               class="text-sm text-slate-600 hover:text-slate-900">
                ← Retour au rapport des visites
            </a>

            <p class="text-[11px] text-slate-400">
                Ces paramètres sont pour l’instant informatifs. Ils pourront être connectés à la base de données plus tard.
            </p>
        </div>

    </div>
</div>

</body>
</html>
