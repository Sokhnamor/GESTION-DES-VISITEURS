<!DOCTYPE html>

<html class="light" lang="fr"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Historique des Visites</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,0" rel="stylesheet"/>
<script>
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "primary": "#135bec",
            "background-light": "#f6f6f8",
            "background-dark": "#101622",
          },
          fontFamily: {
            "display": ["Inter", "sans-serif"]
          },
          borderRadius: {
            "DEFAULT": "0.25rem",
            "lg": "0.5rem",
            "xl": "0.75rem",
            "full": "9999px"
          },
        },
      },
    }
  </script>
<style>
    .material-symbols-outlined {
      font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }
  </style>
</head>
<body class="font-display bg-background-light dark:bg-background-dark text-[#0d121b] dark:text-white">
<div class="flex min-h-screen">
<!-- SideNavBar -->
<aside class="w-64 shrink-0 bg-[#f8f9fc] dark:bg-[#181f2c] border-r border-[#e7ebf3] dark:border-[#2a3140] p-4 flex flex-col justify-between">
<div class="flex flex-col gap-4">
<div class="flex items-center gap-3 p-2">
<div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="User avatar for Kara SAMB" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDm31whziKfIledgo5A-QkgzjNJMm4j59XLAEZY--JWsHDN8jObyf0gAhqyFqRsDhY0wjY-RndwduAuI0lvnixEz9PD8BbOWtSSYTgQhmECQzOWDi9WT4rBCLXJmzWvQmWP9MOuM4K_muYGtEyyhiezn_ACPMTyfNMZedBytuikyQFkx_eAvPhyPXRha16Q-taoc2UHE_uTHQwalcL5jf7dFGVBZIJZnXpR42zCfusZ4AZK35LC8ZOFB4_u6i90j_5GODtYaDAaJQ");'></div>
<div class="flex flex-col">
<h1 class="text-[#0d121b] dark:text-white text-base font-medium leading-normal">
    @if(Auth::check())
    {{ Auth::user()->name }}</h1>
    @endif
<p class="text-[#4c669a] dark:text-[#a0aec0] text-sm font-normal leading-normal">
    @if(Auth::check())
    {{ Auth::user()->role }}</h1>
    @endif
</p>
</div>
</div>
<nav class="flex flex-col gap-2 mt-4">
<a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-[#e7ebf3] dark:hover:bg-primary/20 transition-colors" href="{{ route('dashboard') }}">
<span class="material-symbols-outlined text-[#0d121b] dark:text-white">dashboard</span>
<p class="text-[#0d121b] dark:text-white text-sm font-medium leading-normal">Dashboard</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-[#e7ebf3] dark:hover:bg-primary/20 transition-colors" href="{{ route('gestionclient') }}">
<span class="material-symbols-outlined text-[#0d121b] dark:text-white">group</span>
<p class="text-[#0d121b] dark:text-white text-sm font-medium leading-normal">Clients</p>
</a>
@if(Auth::user()->role=='admin')
<a class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800" href="{{route('utilisateurs')}}">
<span class="material-symbols-outlined text-gray-900 dark:text-white">group</span>
<p class="text-sm font-medium">Utilisateurs</p>
</a>
@endif
<a class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/20 dark:bg-primary/30" href="#">
<span class="material-symbols-outlined text-primary dark:text-white" style="font-variation-settings: 'FILL' 1;">history</span>
<p class="text-primary dark:text-white text-sm font-bold leading-normal">Historique des Visites</p>
</a>
{{-- <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-[#e7ebf3] dark:hover:bg-primary/20 transition-colors" href="{{ route('visites.parametres') }}">
<span class="material-symbols-outlined text-[#0d121b] dark:text-white">toggle_on</span>
<p class="text-[#0d121b] dark:text-white text-sm font-medium leading-normal">Paramètres</p>
</a> --}}
<a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-[#e7ebf3] dark:hover:bg-primary/20 transition-colors"
    href="{{ route('visites.parametres') }}"
    target="_blank"
    rel="noopener noreferrer">
    <span class="material-symbols-outlined text-[#0d121b] dark:text-white">toggle_on</span>
    <p class="text-[#0d121b] dark:text-white text-sm font-medium leading-normal">Paramètres</p>
</a>

</nav>
</div>
<div class="flex flex-col gap-1">
<a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-[#e7ebf3] dark:hover:bg-primary/20 transition-colors" href="{{ route('connexion') }}">
<span class="material-symbols-outlined text-[#0d121b] dark:text-white">logout</span>
<p class="text-[#0d121b] dark:text-white text-sm font-medium leading-normal">Déconnexion</p>
</a>
</div>
</aside>
<main class="flex-1 p-8 overflow-y-auto">
<div class="max-w-7xl mx-auto">
<div class="flex flex-wrap justify-between items-center gap-4 mb-6">
<div class="flex flex-col">
<h1 class="text-[#0d121b] dark:text-white text-4xl font-black leading-tight tracking-[-0.033em]">Historique des Visites</h1>
<p class="text-[#4c669a] dark:text-[#a0aec0] text-base font-normal leading-normal mt-1">Consultez, filtrez et exportez les détails de toutes les visites enregistrées.</p>
</div>
<button class="flex items-center justify-center gap-2 cursor-pointer rounded-lg h-10 px-4 bg-primary text-white text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-colors">
<span class="material-symbols-outlined text-white text-lg">download</span>
<span class="truncate">Exporter</span>
</button>
</div>
<div class="flex flex-wrap gap-3 p-3 bg-white dark:bg-[#181f2c] rounded-xl border border-[#e7ebf3] dark:border-[#2a3140] mb-6">
<button onclick="openModal('modalClient')" class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-[#e7ebf3] dark:bg-[#2a3140] pl-3 pr-2 text-[#0d121b] dark:text-white hover:bg-[#cfd7e7] dark:hover:bg-[#343a4a] transition-colors cursor-pointer">
<span class="material-symbols-outlined text-lg">person</span>
<p class="text-sm font-medium leading-normal">Filtrer par Client</p>
<span class="material-symbols-outlined text-lg">arrow_drop_down</span>
</button>

<button onclick="openModal('modalDate')" class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-[#e7ebf3] dark:bg-[#2a3140] pl-3 pr-2 text-[#0d121b] dark:text-white hover:bg-[#cfd7e7] dark:hover:bg-[#343a4a] transition-colors cursor-pointer">
<span class="material-symbols-outlined text-lg">calendar_month</span>
<p class="text-sm font-medium leading-normal">Date de la visite</p>
<span class="material-symbols-outlined text-lg">arrow_drop_down</span>
</button>

<button onclick="openModal('modalMotif')" class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-[#e7ebf3] dark:bg-[#2a3140] pl-3 pr-2 text-[#0d121b] dark:text-white hover:bg-[#cfd7e7] dark:hover:bg-[#343a4a] transition-colors cursor-pointer">
<span class="material-symbols-outlined text-lg">info</span>
<p class="text-sm font-medium leading-normal">Motif de la visite</p>
<span class="material-symbols-outlined text-lg">arrow_drop_down</span>
</button>

<button onclick="openModal('modalPersonne')" class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-[#e7ebf3] dark:bg-[#2a3140] pl-3 pr-2 text-[#0d121b] dark:text-white hover:bg-[#cfd7e7] dark:hover:bg-[#343a4a] transition-colors cursor-pointer">
<span class="material-symbols-outlined text-lg">groups</span>
<p class="text-sm font-medium leading-normal">Personne rencontrée</p>
<span class="material-symbols-outlined text-lg">arrow_drop_down</span>
</button>
</div>


<div id="modalClient" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50" onclick="closeModalOnBackdrop(event, 'modalClient')">
<div class="bg-white dark:bg-[#181f2c] rounded-xl p-6 max-w-sm w-full mx-4" onclick="event.stopPropagation()">
<div class="flex items-center justify-between mb-4">
<h2 class="text-lg font-bold text-[#0d121b] dark:text-white">Filtrer par Client</h2>
<button onclick="closeModal('modalClient')" class="text-[#4c669a] dark:text-[#a0aec0] hover:text-[#0d121b] dark:hover:text-white">
<span class="material-symbols-outlined">close</span>
</button>
</div>
<form method="GET" action="{{ route('visites.index') }}" class="space-y-4">
<div>
<label class="block text-sm font-medium text-[#0d121b] dark:text-white mb-2">Sélectionner un client</label>
<select name="client_id" class="w-full px-3 py-2 border border-[#e7ebf3] dark:border-[#2a3140] rounded-lg bg-white dark:bg-[#101622] text-[#0d121b] dark:text-white text-sm">
<option value="">-- Tous les clients --</option>
@forelse($clients ?? [] as $client)
<option value="{{ $client->id }}" {{ request('client_id') == $client->id ? 'selected' : '' }}>
{{ $client->nom }} {{ $client->prenom ?? '' }}
</option>
@empty
<option disabled>Aucun client disponible</option>
@endforelse
</select>
</div>
<div class="flex gap-2 pt-4">
<button type="submit" class="flex-1 px-4 py-2 bg-primary text-white rounded-lg font-medium hover:bg-primary/90 transition-colors">
Filtrer
</button>
<button type="button" onclick="closeModal('modalClient')" class="flex-1 px-4 py-2 border border-[#e7ebf3] dark:border-[#2a3140] text-[#0d121b] dark:text-white rounded-lg font-medium hover:bg-[#f8f9fc] dark:hover:bg-[#101622] transition-colors">
Annuler
</button>
</div>
</form>
</div>
</div>

<div id="modalDate" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50" onclick="closeModalOnBackdrop(event, 'modalDate')">
<div class="bg-white dark:bg-[#181f2c] rounded-xl p-6 max-w-sm w-full mx-4" onclick="event.stopPropagation()">
<div class="flex items-center justify-between mb-4">
<h2 class="text-lg font-bold text-[#0d121b] dark:text-white">Filtrer par Date</h2>
<button onclick="closeModal('modalDate')" class="text-[#4c669a] dark:text-[#a0aec0] hover:text-[#0d121b] dark:hover:text-white">
<span class="material-symbols-outlined">close</span>
</button>
</div>
<form method="GET" action="{{ route('visites.index') }}" class="space-y-4">
<div>
<label class="block text-sm font-medium text-[#0d121b] dark:text-white mb-2">Date de début</label>
<input type="date" name="date_debut" value="{{ request('date_debut') }}" class="w-full px-3 py-2 border border-[#e7ebf3] dark:border-[#2a3140] rounded-lg bg-white dark:bg-[#101622] text-[#0d121b] dark:text-white text-sm">
</div>
<div>
<label class="block text-sm font-medium text-[#0d121b] dark:text-white mb-2">Date de fin</label>
<input type="date" name="date_fin" value="{{ request('date_fin') }}" class="w-full px-3 py-2 border border-[#e7ebf3] dark:border-[#2a3140] rounded-lg bg-white dark:bg-[#101622] text-[#0d121b] dark:text-white text-sm">
</div>
<div class="flex gap-2 pt-4">
<button type="submit" class="flex-1 px-4 py-2 bg-primary text-white rounded-lg font-medium hover:bg-primary/90 transition-colors">
Filtrer
</button>
<button type="button" onclick="closeModal('modalDate')" class="flex-1 px-4 py-2 border border-[#e7ebf3] dark:border-[#2a3140] text-[#0d121b] dark:text-white rounded-lg font-medium hover:bg-[#f8f9fc] dark:hover:bg-[#101622] transition-colors">
Annuler
</button>
</div>
</form>
</div>
</div>

<!-- Modale: Motif de la visite -->
<div id="modalMotif" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50" onclick="closeModalOnBackdrop(event, 'modalMotif')">
<div class="bg-white dark:bg-[#181f2c] rounded-xl p-6 max-w-sm w-full mx-4" onclick="event.stopPropagation()">
<div class="flex items-center justify-between mb-4">
<h2 class="text-lg font-bold text-[#0d121b] dark:text-white">Filtrer par Motif</h2>
<button onclick="closeModal('modalMotif')" class="text-[#4c669a] dark:text-[#a0aec0] hover:text-[#0d121b] dark:hover:text-white">
<span class="material-symbols-outlined">close</span>
</button>
</div>
<form method="GET" action="{{ route('visites.index') }}" class="space-y-4">
<div>
<label class="block text-sm font-medium text-[#0d121b] dark:text-white mb-2">Sélectionner un motif</label>
<select name="motif" class="w-full px-3 py-2 border border-[#e7ebf3] dark:border-[#2a3140] rounded-lg bg-white dark:bg-[#101622] text-[#0d121b] dark:text-white text-sm">
<option value="">-- Tous les motifs --</option>
<option value="Réunion" {{ request('motif') == 'Réunion' ? 'selected' : '' }}>Réunion</option>
<option value="Visite client" {{ request('motif') == 'Visite client' ? 'selected' : '' }}>Visite client</option>
<option value="Support technique" {{ request('motif') == 'Support technique' ? 'selected' : '' }}>Support technique</option>
<option value="Audit" {{ request('motif') == 'Audit' ? 'selected' : '' }}>Audit</option>
<option value="Formation" {{ request('motif') == 'Formation' ? 'selected' : '' }}>Formation</option>
</select>
</div>
<div class="flex gap-2 pt-4">
<button type="submit" class="flex-1 px-4 py-2 bg-primary text-white rounded-lg font-medium hover:bg-primary/90 transition-colors">
Filtrer
</button>
<button type="button" onclick="closeModal('modalMotif')" class="flex-1 px-4 py-2 border border-[#e7ebf3] dark:border-[#2a3140] text-[#0d121b] dark:text-white rounded-lg font-medium hover:bg-[#f8f9fc] dark:hover:bg-[#101622] transition-colors">
Annuler
</button>
</div>
</form>
</div>
</div>

<div id="modalPersonne" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50" onclick="closeModalOnBackdrop(event, 'modalPersonne')">
<div class="bg-white dark:bg-[#181f2c] rounded-xl p-6 max-w-sm w-full mx-4" onclick="event.stopPropagation()">
<div class="flex items-center justify-between mb-4">
<h2 class="text-lg font-bold text-[#0d121b] dark:text-white">Filtrer par Personne rencontrée</h2>
<button onclick="closeModal('modalPersonne')" class="text-[#4c669a] dark:text-[#a0aec0] hover:text-[#0d121b] dark:hover:text-white">
<span class="material-symbols-outlined">close</span>
</button>
</div>
<form method="GET" action="{{ route('visites.index') }}" class="space-y-4">
<div>
<label class="block text-sm font-medium text-[#0d121b] dark:text-white mb-2">Rechercher une personne</label>
<input type="text" name="personne_rencontree" value="{{ request('personne_rencontree') }}" placeholder="Nom ou prénom..." class="w-full px-3 py-2 border border-[#e7ebf3] dark:border-[#2a3140] rounded-lg bg-white dark:bg-[#101622] text-[#0d121b] dark:text-white text-sm">
</div>
<div class="flex gap-2 pt-4">
<button type="submit" class="flex-1 px-4 py-2 bg-primary text-white rounded-lg font-medium hover:bg-primary/90 transition-colors">
Filtrer
</button>
<button type="button" onclick="closeModal('modalPersonne')" class="flex-1 px-4 py-2 border border-[#e7ebf3] dark:border-[#2a3140] text-[#0d121b] dark:text-white rounded-lg font-medium hover:bg-[#f8f9fc] dark:hover:bg-[#101622] transition-colors">
Annuler
</button>
</div>
</form>
</div>
</div>

<script>
function openModal(modalId) {
  document.getElementById(modalId).classList.remove('hidden');
}

function closeModal(modalId) {
  document.getElementById(modalId).classList.add('hidden');
}

function closeModalOnBackdrop(event, modalId) {
  if (event.target.id === modalId) {
    closeModal(modalId);
  }
}
</script>

{{-- FORMULAIRE DE RECHERCHE --}}

<!-- Table -->
<div class="bg-white dark:bg-[#181f2c] rounded-xl border border-[#e7ebf3] dark:border-[#2a3140] overflow-hidden">
<div class="overflow-x-auto">
<table class="w-full text-left">
<thead>
<tr class="bg-[#f8f9fc] dark:bg-black/20">
<th class="p-4 text-[#0d121b] dark:text-white text-sm font-medium leading-normal w-1/5">Date</th>
<th class="p-4 text-[#0d121b] dark:text-white text-sm font-medium leading-normal w-1/4">Client</th>
<th class="p-4 text-[#0d121b] dark:text-white text-sm font-medium leading-normal w-1/4">Motif de la visite</th>
<th class="p-4 text-[#0d121b] dark:text-white text-sm font-medium leading-normal w-1/5">Personne rencontrée</th>
<th class="p-4 text-[#0d121b] dark:text-white text-sm font-medium leading-normal">Rapport</th>
</tr>
</thead>
<tbody>
<tbody>
    @forelse($visites as $visite)
        <tr class="border-t border-t-[#cfd7e7] dark:border-t-[#2a3140] hover:bg-[#f8f9fc] dark:hover:bg-black/20 transition-colors">
            <td class="h-[72px] p-4 text-[#4c669a] dark:text-[#a0aec0] text-sm font-normal leading-normal">
                {{ $visite->heure_arrivee }}
            </td>
            <td class="h-[72px] p-4 text-[#0d121b] dark:text-white text-sm font-normal leading-normal">
                {{ $visite->nom_visiteur }}
            </td>
            <td class="h-[72px] p-4 text-[#4c669a] dark:text-[#a0aec0] text-sm font-normal leading-normal">
                {{ $visite->motif ?? '-' }}
            </td>
            <td class="h-[72px] p-4 text-[#4c669a] dark:text-[#a0aec0] text-sm font-normal leading-normal">
                {{ $visite->personne_rencontree ?? '-' }}
            </td>
            <td class="h-[72px] p-4">
                <a href="{{ route('visites.show', $visite->id) }}"
                    target="_blank" 
                    rel="noopener noreferrer"
                    class="text-primary text-sm font-bold leading-normal tracking-[0.015em] hover:underline">
                    Voir le rapport
                </a>
            </td>


        </tr>
    @empty
        <tr>
            <td colspan="5" class="h-[72px] p-4 text-center text-sm text-[#4c669a] dark:text-[#a0aec0]">
                Aucune visite enregistrée pour le moment.
            </td>
        </tr>
    @endforelse
</tbody>

</tbody>
</table>
</div>
</div>
<!-- Pagination -->

@if($visites->hasPages())

    <div class="flex items-center justify-center p-4 mt-4">

        {{-- Bouton précédent --}}
        @if ($visites->onFirstPage())
            <!-- Désactivé -->
            <span class="flex size-10 items-center justify-center opacity-40 cursor-default">
                <span class="material-symbols-outlined text-lg">chevron_left</span>
            </span>
        @else
            <!-- Aller à la page précédente -->
            <a href="{{ $visites->previousPageUrl() }}"
               class="flex size-10 items-center justify-center hover:bg-[#e7ebf3] dark:hover:bg-[#2a3140]">
                <span class="material-symbols-outlined text-lg">chevron_left</span>
            </a>
        @endif



        @for ($page = 1; $page <= $visites->lastPage(); $page++)

            @if ($page == $visites->currentPage())
                <span class="flex size-10 items-center justify-center text-white rounded-lg bg-primary">
                    {{ $page }}
                </span>

            @else
                <a href="{{ $visites->url($page) }}"
                   class="flex size-10 items-center justify-center hover:bg-[#e7ebf3] dark:hover:bg-[#2a3140]">
                    {{ $page }}
                </a>
            @endif

        @endfor



        @if ($visites->hasMorePages())
            <a href="{{ $visites->nextPageUrl() }}"
               class="flex size-10 items-center justify-center hover:bg-[#e7ebf3] dark:hover:bg-[#2a3140]">
                <span class="material-symbols-outlined text-lg">chevron_right</span>
            </a>
        @else
            <span class="flex size-10 items-center justify-center opacity-40 cursor-default">
                <span class="material-symbols-outlined text-lg">chevron_right</span>
            </span>
        @endif

    </div>

@endif

</div>
</main>
</div>
</body></html>
