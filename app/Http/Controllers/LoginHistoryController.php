<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoginHistory;
use App\Models\Compte;

class LoginHistoryController extends Controller
{
    public function index()
    {
        $loginHistories = LoginHistory::with('compte')->orderBy('login_time', 'desc')->get();

        return view('admin.login_history', compact('loginHistories'));
    }
}


