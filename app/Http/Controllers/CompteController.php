<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compte;
use App\Models\Personne;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CompteController extends Controller
{
    public function index()
    {
        $comptes = Compte::with('personne')
            ->where('role', '!=', 'ADMIN_USER') // Exclure ADMIN_USER
            ->get();
    
        return view('admin.comptes.index', compact('comptes'));
    }

    // 🔹 Afficher le formulaire de création de compte
    public function create()
    {
        $personnes = Personne::all();
        return view('comptes.create', compact('personnes'));
    }

    // 🔹 Enregistrer un nouveau compte
    public function store(Request $request)
{
    try {
    $request->validate([
        'personne_id' => 'required|exists:personnes,id',
        'role' => 'required|in:SCRUM_MASTER,PRODUCT_OWNER,TEAM_MEMBER',
        'login' => 'required|email|unique:comptes,login',
        'password' => 'required|string|min:8',
    ]);

    $personne = Personne::findOrFail($request->personne_id);
    
    // Vérifier l'unicité d'ADMIN_USER
    if ($request->role === 'ADMIN_USER' && Compte::where('role', 'ADMIN_USER')->exists()) {
        return back()->withErrors(['role' => 'Un seul compte ADMIN_USER est autorisé.']);
    }

    // Créer le compte avec le login et le mot de passe envoyés par JavaScript
    $compte = Compte::create([
        'personne_id' => $personne->id,
        'login' => $request->login,
        'password' => Hash::make($request->password),  // Hasher le mot de passe
        'role' => $request->role,
        'enabled' => 1,
        'locked' => 0,
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Compte créé avec succès.',
        'generatedLogin' => $request->login,
        'generatedPassword' => $request->password,
    ]);
} catch (\Exception $e) {
    return response()->json([
        'success' => false,
        'message' => 'Une erreur est survenue : ' . $e->getMessage(),
    ], 500);
}
}


    // 🔹 Modifier le rôle d’un compte
    public function updateRole(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|in:SCRUM_MASTER,PRODUCT_OWNER,TEAM_MEMBER',
        ]);

        $compte = Compte::findOrFail($id);

        // 🔹 Empêcher de modifier un ADMIN_USER
        if ($compte->role === 'ADMIN_USER') {
            return back()->withErrors(['role' => 'Le rôle ADMIN_USER ne peut pas être changé.']);
        }

        $compte->role = $request->role;
        $compte->save();

        return back()->with('success', 'Rôle mis à jour.');
    }

    // 🔹 Activer/Désactiver un compte
    public function toggleStatus($id)
    {
        $compte = Compte::findOrFail($id);
        $compte->enabled = !$compte->enabled;
        $compte->save();

        return back()->with('success', 'Statut du compte mis à jour.');
    }

    // 🔹 Verrouiller/Déverrouiller un compte
    public function toggleLock($id)
    {
        $compte = Compte::findOrFail($id);
        $compte->locked = !$compte->locked;
        $compte->save();

        return back()->with('success', 'Verrouillage mis à jour.');
    }

    // 🔹 Supprimer un compte
    public function destroy($id)
    {
        $compte = Compte::findOrFail($id);
        
        // 🔹 Empêcher la suppression d’ADMIN_USER
        if ($compte->role === 'ADMIN_USER') {
            return back()->withErrors(['delete' => 'Le compte ADMIN_USER ne peut pas être supprimé.']);
        }

        $compte->delete();
        return back()->with('success', 'Compte supprimé.');
    }
}
