@extends('viewSideNavbarClient')
@section('dashnav')
</div>
<nav class="flex flex-col gap-2 mt-4">
<a class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800" href="{{route('dashboard')}}">
<span class="material-symbols-outlined text-gray-900 dark:text-white">dashboard</span>
<p class="text-sm font-medium">Tableau de bord</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/10 dark:bg-primary/20" href="{{route('gestionclient')}}">
<span class="material-symbols-outlined font-bold text-primary">group</span>
<p class="text-primary text-sm font-bold">Clients</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800" href="{{route('visites.create')}}">
<span class="material-symbols-outlined text-gray-900 dark:text-white">calendar_today</span>
<p class="text-sm font-medium">Visites</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800" href="{{ route('visites.index') }}">
<span class="material-symbols-outlined text-gray-900 dark:text-white">bar_chart</span>
<p class="text-sm font-medium">Rapports</p>
</a>
</nav>
</div>
@endsection
@section('content')
<!-- Page Heading -->
<header class="flex flex-wrap justify-between gap-4 items-center mb-8">
<div class="flex min-w-72 flex-col">
<h1 class="text-gray-900 dark:text-white text-4xl font-black leading-tight tracking-[-0.033em]">Gestion des Clients</h1>
<p class="text-gray-500 dark:text-gray-400 text-base font-normal leading-normal mt-1">Ajouter, modifier, et consulter les clients et leurs visites.</p>
</div>
</header>
<div class="grid grid-cols-12 gap-6">
<!-- Left Column: Client List -->
<div class="col-span-4">
<div class="bg-white dark:bg-gray-900/50 rounded-xl border border-gray-200 dark:border-gray-800 h-full">
<div class="p-4 border-b border-gray-200 dark:border-gray-800">
<h2 class="text-gray-900 dark:text-white text-lg font-bold">Liste des Clients</h2>
</div>
<div class="p-4">
<!-- SearchBar -->
<label class="flex flex-col min-w-40 h-11 w-full">
<div class="flex w-full flex-1 items-stretch rounded-lg h-full">
<div class="text-gray-500 dark:text-gray-400 flex bg-gray-100 dark:bg-gray-800 items-center justify-center pl-3.5 rounded-l-lg border-y border-l border-gray-200 dark:border-gray-700">
<span class="material-symbols-outlined">search</span>
</div>
<input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-r-lg text-gray-900 dark:text-white focus:outline-0 focus:ring-2 focus:ring-primary/50 border-y border-r border-gray-200 dark:border-gray-700 bg-gray-100 dark:bg-gray-800 focus:border-primary/50 h-full placeholder:text-gray-500 dark:placeholder:text-gray-400 px-3 pl-2 text-sm font-normal leading-normal" placeholder="Rechercher par nom, entreprise..." value=""/>
</div>
</label>
<!-- SingleButton -->
<button class="flex w-full mt-4 min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary text-white gap-2 text-sm font-bold leading-normal tracking-[0.015em]">
<span class="material-symbols-outlined text-base">add</span>
<span class="truncate">Ajouter un Client</span>
</button>
</div>
<!-- Client List -->
<div class="px-2 pb-2 flex flex-col gap-1 max-h-[calc(100vh-320px)] overflow-y-auto">

@foreach($clients as $client)
<div class="p-3 rounded-lg cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-800">
<p class="font-medium text-sm text-gray-800 dark:text-gray-200">
    {{$client->prenom}} {{$client->nom}}
</p>
<p class="text-xs text-gray-500 dark:text-gray-400">
    {{$client->entreprise}}.
</p>
</div>
</a>
@endforeach
</div>
</div>
</div>
<!-- Right Column: Client Details -->
<div class="col-span-8">
<div class="bg-white dark:bg-gray-900/50 rounded-xl border border-gray-200 dark:border-gray-800">
<!-- SectionHeader -->
<div class="flex justify-between items-center p-4 border-b border-gray-200 dark:border-gray-800">
<h2 class="text-gray-900 dark:text-white text-lg font-bold">Ajouter Client
    
</h2>
<button class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-9 px-4 bg-primary/10 dark:bg-primary/20 text-primary gap-2 text-sm font-bold leading-normal tracking-[0.015em]">
<span class="material-symbols-outlined text-base">add</span>
<span class="truncate">Client</span>
</button>
</div>
<!-- Tabs -->
<div class="border-b border-gray-200 dark:border-gray-800">

</div>
<!-- Client Info Form -->
 <form action="{{route('ajoutClientPost')}}" method="post">
  @csrf
<div class="p-6 grid grid-cols-2 gap-x-6 gap-y-5">
<div>
    @error('nom')
        <div class="text-red-600 text-sm mb-2">{{ $message }}</div>
    @enderror
<label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="nom">nom</label>
<input class="form-input mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-white shadow-sm focus:border-primary focus:ring-primary sm:text-sm" id="nom"   name="nom" type="text" value="{{old('nom')}}"/>
</div>
<div>
     @error('prenom')
        <div class="text-red-600 text-sm mb-2">{{ $message }}</div>
    @enderror
<label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="prenom">Prénom</label>
<input class="form-input mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-white shadow-sm focus:border-primary focus:ring-primary sm:text-sm" id="prenom" name="prenom"   type="text" value="{{old('prenom')}}"/>
</div>
<div>
     @error('telephone')
        <div class="text-red-600 text-sm mb-2">{{ $message }}</div>
    @enderror
<label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="telephone">Téléphone</label>
<input class="form-input mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-white shadow-sm focus:border-primary focus:ring-primary sm:text-sm" id="telephone" name="telephone"   type="tel" value="{{old('telephone')}}"/>
</div>
<div>
     @error('email')
        <div class="text-red-600 text-sm mb-2">{{ $message }}</div>
    @enderror
<label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="email">Email</label>
<input class="form-input mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-white shadow-sm focus:border-primary focus:ring-primary sm:text-sm" id="email"   type="email" name="email" value="{{old('email')}}"/>
</div>
<div class="col-span-2">
    
<label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="entreprise">Entreprise</label>
<input class="form-input mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-white shadow-sm focus:border-primary focus:ring-primary sm:text-sm" id="entreprise"   name="entreprise" type="text" value="{{old('entreprise')}}"/>
</div>
</div>
<button type="submit" class="flex m-6 min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary text-white gap-2 text-sm font-bold leading-normal tracking-[0.015em]">Valider</button>
</form>
</div>
</div>
</div>
@endsection