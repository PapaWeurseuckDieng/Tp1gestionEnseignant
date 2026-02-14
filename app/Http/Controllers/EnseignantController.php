<?php

namespace App\Http\Controllers;

use App\Models\Enseignant;
use Illuminate\Http\Request;

class EnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Enseignant::where('statut', 'actif');

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('matricule', 'like', "%{$request->search}%")
                  ->orWhere('nom', 'like', "%{$request->search}%")
                  ->orWhere('prenom', 'like', "%{$request->search}%")
                  ->orWhere('departement', 'like', "%{$request->search}%");
            });
        }

        $enseignants = $query->get();

        return view('enseignants.index', compact('enseignants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('enseignants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'matricule'   => 'required|unique:enseignants',
            'nom'         => 'required',
            'prenom'      => 'required',
            'email'       => 'required|email|unique:enseignants',
            'telephone'   => 'nullable',
            'grade'       => 'required',
            'departement' => 'required'
        ]);

        Enseignant::create($request->all());

        return redirect()->route('enseignants.index')->with('success', 'Enseignant ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Enseignant $enseignant)
    {
        return view('enseignants.show', compact('enseignant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enseignant $enseignant)
    {
        return view('enseignants.edit', compact('enseignant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enseignant $enseignant)
    {
        $request->validate([
            'nom'         => 'required',
            'prenom'      => 'required',
            'email'       => 'required|email',
            'telephone'   => 'nullable',
            'grade'       => 'required',
            'departement' => 'required'
        ]);

        $enseignant->update($request->all());

        return redirect()->route('enseignants.index')->with('success', 'Enseignant modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enseignant $enseignant)
    {
        // Suppression logique
        $enseignant->update([
            'statut' => 'inactif'
        ]);

        return redirect()->route('enseignants.index')
                         ->with('success', 'Enseignant désactivé avec succès');
    }
}