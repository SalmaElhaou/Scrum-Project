<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\PersonneController;

use App\Http\Controllers\ProjectController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    return view('index');
});



Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::middleware(['auth'])->group(function () {


    // Redirections vers les différents tableaux de bord en fonction du rôle
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard'); // Tableau de bord de l'admin
    })->name('admin.dashboard');

    Route::get('/scrum-master/dashboard', function () {
        return view('scrumMaster.dashboard'); // Tableau de bord du Scrum Master
    })->name('scrum.master.dashboard');

    Route::get('/product-owner/dashboard', function () {
        return view('productOwner.dashboard'); // Tableau de bord du Product Owner
    })->name('product.owner.dashboard');

    Route::get('/team-member/dashboard', function () {
        return view('teamMember.dashboard'); // Tableau de bord du Team Member
    })->name('team.member.dashboard');
    Route::get('/admin/personnes', [PersonneController::class, 'index'])->name('admin.personnes');
    Route::post('/admin/personnes/ajouter', [PersonneController::class, 'store'])->name('admin.personnes.store');
    Route::post('/admin/comptes/creer', [CompteController::class, 'store'])->name('admin.comptes.creer');

    // Autres routes pour l'administration des comptes
    Route::get('/comptes', [CompteController::class, 'index'])->name('comptes.index');
    Route::get('/comptes/create', [CompteController::class, 'create'])->name('comptes.create');
    Route::post('/comptes', [CompteController::class, 'store'])->name('comptes.store');
    Route::post('/comptes/{id}/update-role', [CompteController::class, 'updateRole'])->name('comptes.updateRole');
    Route::post('/comptes/{id}/toggle-status', [CompteController::class, 'toggleStatus'])->name('comptes.toggleStatus');
    Route::post('/comptes/{id}/toggle-lock', [CompteController::class, 'toggleLock'])->name('comptes.toggleLock');
    Route::delete('/comptes/{id}', [CompteController::class, 'destroy'])->name('comptes.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/personnes', [PersonneController::class, 'index'])->name('personnes.index');
    Route::get('/personnes/create', [PersonneController::class, 'create'])->name('personnes.create');
    Route::post('/personnes', [PersonneController::class, 'store'])->name('personnes.store');
    Route::get('/personnes/{id}', [PersonneController::class, 'show'])->name('personnes.show');
    Route::get('/personnes/{id}/edit', [PersonneController::class, 'edit'])->name('personnes.edit');
    Route::put('/personnes/{id}', [PersonneController::class, 'update'])->name('personnes.update');
    Route::delete('/personnes/{id}', [PersonneController::class, 'destroy'])->name('personnes.destroy');
});

Route::resource('projects', ProjectController::class);

