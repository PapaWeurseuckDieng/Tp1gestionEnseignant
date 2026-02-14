@extends('layouts.app')

@section('title', 'Modifier enseignant')

@section('content')

<h2 class="text-2xl font-bold mb-4">Modifier enseignant</h2>

<form method="POST"
      action="{{ route('enseignants.update', $enseignant) }}"
      class="bg-white p-6 shadow rounded space-y-4">
    @csrf
    @method('PUT')

    <input name="nom" value="{{ $enseignant->nom }}" class="border p-2 w-full">
    <input name="prenom" value="{{ $enseignant->prenom }}" class="border p-2 w-full">
    <input name="email" value="{{ $enseignant->email }}" class="border p-2 w-full">
    <input name="telephone" value="{{ $enseignant->telephone }}" class="border p-2 w-full">
    <input name="grade" value="{{ $enseignant->grade }}" class="border p-2 w-full">
    <input name="departement" value="{{ $enseignant->departement }}" class="border p-2 w-full">

    <button class="bg-blue-600 text-white px-4 py-2 rounded">
        Mettre à jour
    </button>
</form>

@endsection