@extends('layouts.app')

@section('title', 'Liste des enseignants')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">
         Liste des enseignants
    </h2>

    <a href="{{ route('enseignants.create') }}"
       class="bg-gradient-to-r from-blue-500 to-indigo-600
              text-white px-4 py-2 rounded-lg shadow
              hover:scale-105 transition">
        + Ajouter
    </a>
</div>

<form method="GET" class="mb-6 flex gap-2">
    <input type="text" name="search"
           placeholder="Rechercher..."
           class="input w-1/2">
    <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg">
        🔍
    </button>
</form>

<div class="overflow-x-auto bg-white rounded-xl shadow-lg">
<table class="w-full">
    <thead class="bg-slate-100 text-left">
        <tr>
            <th class="p-3">Matricule</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Département</th>
            <th>Statut</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($enseignants as $e)
        <tr class="border-t hover:bg-slate-50 transition">
            <td class="p-3">{{ $e->matricule }}</td>
            <td>{{ $e->nom }}</td>
            <td>{{ $e->prenom }}</td>
            <td>{{ $e->departement }}</td>
            <td>
                <span class="px-3 py-1 rounded-full text-sm
                    {{ $e->statut == 'actif' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                    {{ ucfirst($e->statut) }}
                </span>
            </td>
            <td class="flex gap-2 p-3">
                <a href="{{ route('enseignants.edit', $e) }}"
                   class="bg-yellow-400 px-3 py-1 rounded hover:scale-105 transition">
                    ✏️
                </a>

                <form method="POST" action="{{ route('enseignants.destroy', $e) }}">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 text-white px-3 py-1 rounded hover:scale-105 transition">
                        ⛔
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

@endsection