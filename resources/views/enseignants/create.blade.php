@extends('layouts.app')

@section('title', 'Ajouter un enseignant')

@section('content')

<div class="flex justify-center">
    <div class="w-full max-w-2xl bg-white rounded-2xl shadow-xl p-8">

        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">
             Ajouter un enseignant
        </h2>

        <form method="POST" action="{{ route('enseignants.store') }}"
              class="space-y-4">
            @csrf

            <input type="text" name="matricule" placeholder="Matricule"
                class="input">

            <input type="text" name="nom" placeholder="Nom"
                class="input">

            <input type="text" name="prenom" placeholder="Prénom"
                class="input">

            <input type="email" name="email" placeholder="Email"
                class="input">

            <input type="text" name="telephone" placeholder="Téléphone"
                class="input">

            <input type="text" name="grade" placeholder="Grade"
                class="input">

            <input type="text" name="departement" placeholder="Département"
                class="input">

            <div class="flex justify-end pt-4">
                <button
                    class="bg-gradient-to-r from-blue-500 to-indigo-600
                           text-white px-6 py-2 rounded-lg
                           shadow-md hover:scale-105 transition">
                     Enregistrer
                </button>
            </div>
        </form>

    </div>
</div>

<style>
    .input {
        width: 100%;
        padding: 0.75rem;
        border-radius: 0.75rem;
        border: 1px solid #e5e7eb;
        background: #f9fafb;
        transition: all 0.2s;
    }
    .input:focus {
        outline: none;
        border-color: #6366f1;
        background: white;
        box-shadow: 0 0 0 3px rgba(99,102,241,0.2);
    }
</style>

@endsection