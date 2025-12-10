<!DOCTYPE html>

<html class="light" lang="fr"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Gestion des Clients</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
<style>
      .material-symbols-outlined {
        font-variation-settings:
        'FILL' 0,
        'wght' 400,
        'GRAD' 0,
        'opsz' 24
      }
    </style>
<script id="tailwind-config">
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
              "display": ["Inter"]
            },
            borderRadius: {"DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px"},
          },
        },
      }
    </script>
</head>
<body class="font-display bg-background-light dark:bg-background-dark">
<div class="flex h-screen w-full">
<!-- SideNavBar -->
<aside class="flex flex-col w-64 border-r border-gray-200 dark:border-gray-800 bg-white dark:bg-background-dark">
<div class="flex h-full min-h-0 flex-col justify-between p-4">
<div class="flex flex-col gap-4">
<div class="flex items-center gap-3">
<div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="User avatar for Kara SAMB" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAuzkd-DLOCj6T6EfMTd56b70R7eo5vl3MgpNBMv1Px3sQadDxhgnpcK9t4Clvqk2bImJGZQzhX-45rH_5M2WUv766eNq-3g_VNdNQn3ktIGKRDGc8immxUyLzYAJw4JdcdcwpqbNdpKifFfZ5OUK3e4psuci-OafzZTIagAIoD_65_deDRxbujnti3S0MFbCcLygaiYn97Wzwun_M9SBRknVghPvxTkHF2AMWEc5sglq7s0-zenH1Rp2AP5LfUfnHMmUK0NvCNzA");'></div>
<div class="flex flex-col">
<h1 class="text-gray-900 dark:text-white text-base font-medium leading-normal">
  @auth
  {{Auth::user()->name}}
  @endauth
</h1>
<p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal">
  @auth
  {{Auth::user()->role}}
  @endauth
</p>
</div>
@yield('dashnav')
<div class="flex flex-col gap-1">
  <div class="flex flex-col gap-1">
<a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-[#e7ebf3] dark:hover:bg-primary/20 transition-colors" href="{{ route('connexion') }}">
<span class="material-symbols-outlined text-[#0d121b] dark:text-white">logout</span>
<p class="text-[#0d121b] dark:text-white text-sm font-medium leading-normal">Déconnexion</p>
</a>
</div>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800" href="#">
<span class="material-symbols-outlined text-gray-900 dark:text-white">settings</span>
<p class="text-sm font-medium">Paramètres</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800" href="#">
<span class="material-symbols-outlined text-gray-900 dark:text-white">help</span>
<p class="text-sm font-medium">Aide</p>
</a>
</div>
</div>
</aside>
<!-- Main Content -->
<main class="flex-1 flex flex-col h-screen overflow-y-auto">
<div class="p-8">
@yield('content')
</div>
</main>
</div>
</body></html>