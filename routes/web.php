<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Admin\AdminController;
use App\Http\Controllers\Auth\Teacher\TeacherController;
use App\Http\Controllers\Fiche\FicheController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('layouts.palnnig');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::prefix('admin')->group(function () {
    Route::get('login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminController::class, 'login']);
    Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [AdminController::class, 'cards'])->name('admin.dashboard');
        Route::get('/enseignant', [AdminController::class,'indexens'])->name('admin.ens');
        Route::get('addenseignant', [AdminController::class, 'formaddenseignant'])->name('admin.formaddenseignant');
        Route::post('/teacheradded',[AdminController::class, 'create_enseignant'])->name('admin.createens');
        Route::get('/deleteenseignant/{id}',[AdminController::class, 'delete'])->name('deleteens');
        Route::get('/editens/{id}', [AdminController::class,'edit'])->name('updateform');
        Route::post('/ensupdated/{id}',[AdminController::class, 'update'])->name('updateens');
        Route::post('select-student', [AdminController::class, 'selectStudent'])->name('soutenance.selectStudent');
        Route::get('/soutenance', [AdminController::class,'addsoutenance'])->name('addsoutenance');
        Route::post('/createsoutenance', [AdminController::class,'create_soutenance'])->name('create_soutenance');
        Route::get('/soutenancedata', [AdminController::class,'showsoutenance'])->name('showsoutenance');
        Route::get('/deletesoutenance/{id}',[AdminController::class, 'deletesoutenance'])->name('deletesoutenance');
        Route::get('/editsoutenance/{id}', [AdminController::class,'editsoutenance'])->name('editsoutenance');
        Route::post('/updatesoutenance/{id}',[AdminController::class, 'updatesoutenance'])->name('updatesoutenance');
        Route::get('/jury', [AdminController::class,'jury'])->name('jury');
        Route::get('/addjury', [AdminController::class,'addjury'])->name('addjury');
        Route::get('/deletejury/{id}',[AdminController::class, 'deletejury'])->name('deletejury');

        Route::post('/storejury', [AdminController::class,'storejury'])->name('storejury');
        Route::get('/addsalle', [AdminController::class,'addsalle'])->name('addsalle');
        Route::post('/storesalle', [AdminController::class,'storesalle'])->name('storesalle');
    });
});
Route::prefix('teacher')->group(function () {
    // Routes pour l'authentification de l'enseignant
    Route::get('login', [TeacherController::class, 'showLoginForm'])->name('teacher.login');
    Route::post('login', [TeacherController::class, 'login']);
    Route::post('logout', [TeacherController::class, 'logout'])->name('teacher.logout');

    Route::middleware('auth:teacher')->group(function () {
        Route::get('dashboard', [TeacherController::class, 'cardsteacher'])->name('teacher.dashboard');
        Route::get('soutenance', [TeacherController::class, 'mysoutenance'])->name('teacher.soutenance');
        Route::get('dashboard/student', [TeacherController::class, 'studenttable'])->name('teacher.studenttable');
        Route::get('/editfiche/{id}', [TeacherController::class, 'editFiche'])->name("updateformfiche");
        Route::post('/ficheupdated/{id}', [TeacherController::class, 'updateFiche'])->name("updatefiche");
    });
});
Route::controller(FicheController::class)->group(function() {
    Route::get('/fiche','fiche')->name('fiche');
    Route::get('/fiche/pdf/{id}', [FicheController::class, 'generatePDF'])->name('fiche.pdf');
    Route::post('/FicheStore',  'Fichestore')->name('fiche.store');
    
    
});
