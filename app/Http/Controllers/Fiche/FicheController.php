<?php

namespace App\Http\Controllers\Fiche;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enseignant;
use App\Models\Fiche;
use Illuminate\Support\Facades\Auth;
use PDF;

class FicheController extends Controller
{
    public function fiche()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Retrieve the authenticated user's associated enseignant
        $enseignant = $user->enseignant;

        // Return only the authenticated user and their associated enseignant
        return view('layouts.addfiche', compact('user', 'enseignant'));
    }

    public function ficheStore(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'etudiant_id' => 'required|integer', // Assuming etudiant_id is an integer
            'enseignant_id' => 'required|integer', // Assuming enseignant_id is an integer
            'societe_acceuil' => 'required|string',
            'encadrant_externe' => 'required|string',
            'ntel_societe' => 'required|string',
            'mail_societe' => 'required|email',
            'intitule_pfe' => 'required|string',
            'besions_fonctionnels' => 'required|string',
            'technologies_utilisees' => 'required|string',
            'langue' => 'required|string',
        ]);

        // Create a new Fiche instance with the validated data
        $fiche = Fiche::create($validatedData);

        // Check if the Fiche instance was created successfully
        if ($fiche) {
            // Redirect to the dashboard with success message
            return redirect()->route('dashboard')->with('success', 'Fiche enregistrée avec succès!');
        } else {
            // Redirect back with error message
            return redirect()->back()->with('error', 'Erreur lors de la création de la fiche.');
        }
    }

    public function generatePDF($id)
    {
        $fiche = Fiche::find($id);
        $pdf = PDF::loadView('layouts.fiche-pdf', compact('fiche'));
        return $pdf->download('fiche.pdf');
    }
    
}
