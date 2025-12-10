@extends('viewSideNavbarClient')
@section('dashnav')
</div>
<nav class="flex flex-col gap-2 mt-4">
<a class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/10 dark:bg-primary/20 " href="{{route('dashboard')}}">
<span class="material-symbols-outlined text-primary ">dashboard</span>
<p class=" text-primary text-sm font-bold">Tableau de bord</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800" href="{{route('gestionclient')}}">
<span class="material-symbols-outlined font-bold text-gray-900 dark:text-white">group</span>
<p class=" text-sm font-medium">Clients</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800" href="{{route('visites.create')}}">
<span class="material-symbols-outlined text-gray-900 dark:text-white">calendar_today</span>
<p class="text-sm font-medium">Visites</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800" href="{{ route('visites.index') }}">
<span class="material-symbols-outlined text-gray-900 dark:text-white">bar_chart</span>
<p class="text-sm font-medium">Rapports</p>
</a>
@if(Auth::user()->role=='admin')
<a class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800" href="{{route('utilisateurs')}}">
<span class="material-symbols-outlined text-gray-900 dark:text-white">group</span>
<p class="text-sm font-medium">Utilisateurs</p>
</a>
@endif
</nav>
</div>
@endsection
@section('content')
<!-- PageHeading -->
<div class="flex flex-wrap justify-between items-center gap-4 mb-6">
<div class="flex flex-col gap-1">
<h1 class="text-3xl font-black leading-tight tracking-tight text-gray-900 dark:text-white">Tableau de Bord</h1>
<p class="text-base font-normal text-gray-500 dark:text-gray-400">Aperçu des visites clients et des tendances.</p>
</div>
<!-- Chips -->
<!-- <div class="flex gap-2">
<button class="flex h-9 items-center justify-center gap-x-2 rounded-lg bg-white dark:bg-white/10 pl-4 pr-3 border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-white/20">
<p class="text-sm font-medium text-gray-800 dark:text-gray-200">Aujourd'hui</p>
<span class="material-symbols-outlined text-gray-500 dark:text-gray-400" style="font-size: 20px;">expand_more</span>
</button>
<button class="flex h-9 items-center justify-center gap-x-2 rounded-lg bg-white dark:bg-white/10 pl-4 pr-3 border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-white/20">
<p class="text-sm font-medium text-gray-800 dark:text-gray-200">Cette semaine</p>
<span class="material-symbols-outlined text-gray-500 dark:text-gray-400" style="font-size: 20px;">expand_more</span>
</button>
</div> -->
</div>
<!-- Stats -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
<div class="flex flex-col gap-2 rounded-xl p-6 bg-white dark:bg-background-dark border border-gray-200 dark:border-gray-800">
<p class="text-base font-medium text-gray-600 dark:text-gray-400">Visiteurs Actuels</p>
<p class="text-3xl font-bold text-gray-900 dark:text-white">{{$visites['visiteurActuel']}}</p>
@if($visites['pourcentageActuel'] >0)
    <p class="text-base font-medium text-green-600 dark:text-green-500">{{ $visites['pourcentageActuel'] }}%</p>
@else
    <p class="text-base font-medium text-red-600 dark:text-red-500">{{ $visites['pourcentageActuel'] }}%</p>
@endif
</div>
<div class="flex flex-col gap-2 rounded-xl p-6 bg-white dark:bg-background-dark border border-gray-200 dark:border-gray-800">
<p class="text-base font-medium text-gray-600 dark:text-gray-400">Visites du Jour</p>
<p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $visites['visiteurJour'] }}</p>
@if($visites['pourcentageJour'] >0)
    <p class="text-base font-medium text-green-600 dark:text-green-500">+{{ $visites['pourcentageJour'] }}%</p>
@else
    <p class="text-base font-medium text-red-600 dark:text-red-500">{{ $visites['pourcentageJour'] }}%</p>
@endif
</div>
<div class="flex flex-col gap-2 rounded-xl p-6 bg-white dark:bg-background-dark border border-gray-200 dark:border-gray-800">
<p class="text-base font-medium text-gray-600 dark:text-gray-400">Visites de la Semaine</p>

<p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $visites['visiteurWeek']}}</p>
@if($visites['pourcentageWeek'] >0)
    <p class="text-base font-medium text-green-600 dark:text-green-500">+{{ $visites['pourcentageWeek'] }}%</p>
@else
    <p class="text-base font-medium text-red-600 dark:text-red-500">{{ $visites['pourcentageWeek'] }}%</p>
@endif
</div>
<div class="flex flex-col gap-2 rounded-xl p-6 bg-white dark:bg-background-dark border border-gray-200 dark:border-gray-800">
<p class="text-base font-medium text-gray-600 dark:text-gray-400">Taux de Conversion</p>
<p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $visites['tauxConversion'] }}%</p>
<p class="text-base font-medium text-green-600 dark:text-green-500">+1.2%</p>
</div>
</div>
<!-- Charts -->
 
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
<div class="lg:col-span-2 flex flex-col gap-4 rounded-xl border border-gray-200 dark:border-gray-800 p-6 bg-white dark:bg-background-dark">
<div class="flex justify-between items-center">
<div>
<p class="text-base font-bold text-gray-900 dark:text-white">Tendance des Visites Mensuelles</p>
<p class="text-sm text-gray-500 dark:text-gray-400">3 derniers mois</p>
</div>
<div class="flex gap-1 items-center">
<p class="text-4xl font-bold text-gray-900 dark:text-white">{{array_sum($visiteurThreeLastMonths['visitesParMois'])}}</p>
@if($visiteurThreeLastMonths['pourcentageTroisMois']> 0)
<p class="text-base font-medium text-green-600 dark:text-green-500 mt-2">+{{$visiteurThreeLastMonths['pourcentageTroisMois']}}%</p>
@else
<p class="text-base font-medium text-red-600 dark:text-red-500 mt-2">{{$visiteurThreeLastMonths['pourcentageTroisMois']}}%</p>
@endif
</div>
</div>
<div class="flex min-h-[250px] flex-1 flex-col gap-8 py-4">
<svg width="100%" height="150" viewBox="0 0 472 150" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
    <defs>
        <linearGradient id="chartGradient" x1="236" x2="236" y1="1" y2="149" gradientUnits="userSpaceOnUse">
            <stop stop-color="#135bec" stop-opacity="0.2"></stop>
            <stop offset="1" stop-color="#135bec" stop-opacity="0"></stop>
        </linearGradient>
    </defs>

    <!-- Zone remplie avec gradient -->
    <polyline 
        points="{{ $visiteurThreeLastMonths['pointsString'] }}"
        fill="url(#chartGradient)"
        stroke="none"
    />

    <!-- Ligne de la courbe -->
    <polyline 
        points="{{ $visiteurThreeLastMonths['pointsString'] }}" 
        fill="none" 
        stroke="#135bec" 
        stroke-width="3" 
        stroke-linecap="round" 
    />
</svg>

<div class="flex justify-around text-gray-500 dark:text-gray-400 text-sm font-bold">
    @foreach($visiteurThreeLastMonths['visitesParMois'] as $mois => $valeur)
        <p>{{ $mois }}</p>
    @endforeach
</div>

</div>
</div>
<div class="lg:col-span-1 flex flex-col gap-4 rounded-xl border border-gray-200 dark:border-gray-800 p-6 bg-white dark:bg-background-dark">
<p class="text-base font-bold text-gray-900 dark:text-white">Visites par Semaine</p>
<div class="grid min-h-[250px] grid-cols-7 gap-4 items-end px-3 pt-6">

    @foreach($visiteursParJour as $jour => $pourcentage)
        <div class="flex flex-col items-center justify-end h-full">
            
            <div
                style="height: {{ $pourcentage }}%;"
                class="bg-primary/20 dark:bg-primary/40 rounded-t w-full transition-all duration-300"
                title="{{ $pourcentage }}%">
            </div>

            <p class="mt-2 text-gray-500 dark:text-gray-400 text-sm font-bold">
                {{ $jour }}
            </p>
        </div>
    @endforeach

</div>

<!-- <div class="bg-primary rounded-t w-full" style="height: 100%;"></div> -->
</div>
</div>
@endsection