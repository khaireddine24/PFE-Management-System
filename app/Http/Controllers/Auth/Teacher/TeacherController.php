<?php

namespace App\Http\Controllers\Auth\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Enseignant; 
use App\Models\Fiche;
use App\Models\User; // Import the Teacher model

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher')->except(['showLoginForm', 'login']);
    }
    public function showLoginForm()
    {
        return view('auth.teacher_login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $teacher = Enseignant::where('email', $credentials['email'])->first();

        if ($teacher && Hash::check($credentials['password'], $teacher->password)) {
            Auth::guard('teacher')->login($teacher);
            return redirect()->route('teacher.dashboard');
        }

        return redirect()->back()->withInput($request->only('email'))->withErrors([
            'email' => 'Email ou mot de passe incorrect.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('teacher')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/teacher/login')->withSuccess('You have logged out successfully!');
    }
    

    public function index()
{
    if (Auth::guard('teacher')->check()) {
        

        return view('auth.teacherdashboard');
    }
}
public function cardsteacher()
{
    $teacher = Auth::user();
    $students = $teacher->etudiants;
    $soutenances = $teacher->soutenances;

    $studentCount = $students->count();
    $soutenanceCount = $soutenances->count();

    return view('auth.cardsteacher', compact( 'studentCount', 'soutenanceCount'));
}

public function studenttable()
{
    $enseignant = auth()->user();

    // Récupérer tous les étudiants supervisés par l'enseignant authentifié
    $data = User::where('enseignant_id', $enseignant->id)
                ->with(['fiches' => function($query) {
                    $query->orderBy('created_at', 'desc'); // Trier par date de création décroissante
                }])
                ->get();

    // Parcourir chaque étudiant pour récupérer la dernière fiche
    $data->each(function($student) {
        $student->latest_fiche = $student->fiches->first(); // La dernière fiche est la première après tri
    });

    return view('auth.studenttable', compact('data'));
}


public function editFiche($id){
    $data=Fiche::select('*')->find($id);
    return view('auth.ficheedit',(['data'=>$data]));
}

public function updateFiche(Request $request, $id)
{
    $request->validate([
        'societe_acceuil' => 'required',
        'encadrant_externe' => 'required',
	    'ntel_societe' => 'required',
	    'mail_societe' => 'required',
	    'intitule_pfe' => 'required',
        'besions_fonctionnels' => 'required',
        'technologies_utilisees' => 'required',
        'langue' => 'required',
        'Remarque'=>'required'
    ]);

    $fiche = [
    'societe_acceuil' => $request->input('societe_acceuil'),
	'encadrant_externe' => $request->input('encadrant_externe'),
	'ntel_societe' => $request->input('ntel_societe'),
	'mail_societe' => $request->input('mail_societe'),
    'intitule_pfe' => $request->input('intitule_pfe'),
    'besions_fonctionnels' => $request->input('besions_fonctionnels'),
    'technologies_utilisees' => $request->input('technologies_utilisees'),
    'langue' => $request->input('langue'),
    'Remarque'=>$request->input('Remarque')
        
    ];

    $rowsAffected = Fiche::where('id', $id)->update($fiche);
    return redirect()->route('teacher.dashboard')->with('valider', 'Fiche updated successfully');
}
public function mysoutenance()
{
    $enseignant = auth()->user();
    $soutenances = $enseignant->soutenances()->with(['etudiant', 'jury', 'sale'])->get();

    return view('auth.teachersoutenance', compact('soutenances'));
}

}
