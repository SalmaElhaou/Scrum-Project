<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personne;

class PersonneController extends Controller
{
    // 🔹 Afficher la liste des personnes
    public function index()
    {
        $personnes = Personne::whereDoesntHave('comptes', function ($query) {
            $query->where('role', 'ADMIN_USER');
        })->get();
        return view('admin.personnes.index', compact('personnes'));
    }

    // 🔹 Afficher le formulaire de création d'une personne
    public function create()
    {
        return view('personnes.create');
    }

    // 🔹 Enregistrer une nouvelle personne
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nom' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'cin' => 'required|string|max:20|unique:personnes',
                'email' => 'required|email|unique:personnes',
                'telephone' => 'required|string|max:20',
            ]);
    
            // Création de la personne
            $personne = Personne::create($validatedData);
    
            return redirect()->route('admin.personnes')->with('success', 'Personne ajoutée avec succès.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de l\'ajout de la personne.')->withInput();
        }
    }
    
    

    // 🔹 Afficher les détails d'une personne
    public function show($id)
    {
        $personne = Personne::findOrFail($id);
        return view('personnes.show', compact('personne'));
    }

    // 🔹 Afficher le formulaire d'édition d'une personne
    public function edit($id)
    {
        $personne = Personne::findOrFail($id);
        return view('personnes.edit', compact('personne'));
    }

    // 🔹 Mettre à jour une personne
    public function update(Request $request, $id)
    {
        $personne = Personne::findOrFail($id);

        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'cin' => 'required|string|max:20|unique:personnes,cin,' . $personne->id,
            'email' => 'required|email|unique:personnes,email,' . $personne->id,
            'telephone' => 'required|string|max:20',
        ]);

        $personne->update($request->all());

        return redirect()->route('personnes.index')->with('success', 'Personne mise à jour avec succès.');
    }

    // 🔹 Supprimer une personne
    public function destroy($id)
    {
        $personne = Personne::findOrFail($id);
        $personne->delete();

        return redirect()->route('personnes.index')->with('success', 'Personne supprimée.');
    }
}
