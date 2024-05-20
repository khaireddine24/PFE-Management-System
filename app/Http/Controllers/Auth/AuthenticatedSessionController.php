<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }
    public function palinning(){
        return view('layouts.palnnig');
    }
    public function mysoutenance()
{
    $etudiant = auth()->user();
    $soutenance = $etudiant->soutenance()->with(['enseignant', 'jury', 'sale'])->first();  
    return view('layouts.studentsoutenance', compact('soutenance'));
}
public function mafiche()
{
    $etudiant = auth()->user();

    if (!$etudiant) {
        return redirect()->route('login');
    }

    $fiche = $etudiant->fiches()->latest()->first(); 

    if (!$fiche) {
        return view('layouts.mafiche')->with('message', 'Aucune fiche trouvée.');
    }

    return view('layouts.mafiche', compact('fiche'));
}






    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
