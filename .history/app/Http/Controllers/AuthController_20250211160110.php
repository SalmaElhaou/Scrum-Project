<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Compte;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function showLoginForm()
{
    return view('login');
}

    // LOGIN
    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|email',
            'password' => 'required|string',
        ]);

        $compte = Compte::where('login', $request->login)->first();

        if (!$compte || !Hash::check($request->password, $compte->password)) {
            return response()->json(['message' => 'Identifiants incorrects'], 401);
        }

        if ($compte->locked) {
            return response()->json(['message' => 'Compte verrouillé suite à plusieurs échecs de connexion'], 403);
        }

        if (!$compte->enabled) {
            return response()->json(['message' => 'Compte désactivé'], 403);
        }

        Auth::login($compte);
       //  dd(Auth::check(), Auth::user());
       //$request->session()->regenerate();

//dd(Auth::check(), Auth::user());

    // Rediriger selon le rôle de l'utilisateur
    return match ($compte->role) {
        'SCRUM_MASTER' => redirect()->route('scrum.master.dashboard'),
        'PRODUCT_OWNER' => redirect()->route('product.owner.dashboard'),
        'ADMIN_USER' => redirect()->route('admin.dashboard'),
        'TEAM_MEMBER' => redirect()->route('team.member.dashboard'),
        default => redirect()->route('login')->withErrors(['login' => 'Rôle non reconnu']),
    };

        // Si nécessaire, tu peux aussi retourner une réponse JSON pour les API
        return response()->json(['message' => 'Connexion réussie', 'user' => Auth::user()]);
    }


    // LOGOUT
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


}
