<?php
namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Enseignant;
use App\Models\User;
use App\Models\Soutenance;
use App\Models\Jury;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin')->except(['showLoginForm', 'login']);
    }
    public function showLoginForm()
    {
        return view('auth.admin_login');
    }
    

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials) ) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->withInput($request->only('email'))->withErrors([
            'email' => 'Email ou mot de passe incorrect.',
        ]);
        
    }

    public function logout(Request $request)
{
    Auth::guard('admin')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/admin/login')->withSuccess('You have logged out successfully!');
}


    public function index()
    {
        return view('auth.admindashboard');
    }
    public function cards()
    {
        $TeachersCount = Enseignant::all()->count();
        $StudentCount = User::all()->count();
        $SoutenanceCount = Soutenance::all()->count();

        return view('auth.cards',compact('TeachersCount','StudentCount','SoutenanceCount'));
    }
    public function indexens()
    {
       
        $data=Enseignant::select("*")->get();//elequent model

        return view('auth.enstable', compact('data'));
    }
    public function formaddenseignant()
    {
        return view('auth.addenseignant');
    }  
    public function create_enseignant(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            
        ]);
    
        $ens = new Enseignant([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
    
        
        $ens->save();
    
        return redirect()->route('admin.ens')->with('success', 'encadrent added successfully');
    }
    public function delete($id)
    {
        DB::table('enseignants')->where('id',$id)->delete();
        return redirect()->route('admin.ens');
    }
    public function edit($id){
        $data=Enseignant::select('*')->find($id);
        return view('Auth.updateens',(['data'=>$data]));
    }
    public function update(Request $request, $id)
{
    $request->validate([
    'name' => 'required',
	'email' => 'required',
        
    ]);

    $ens= [
        'name' => $request->input('name'),
        
    ];

    $rowsAffected = Enseignant::where('id', $id)->update($ens);

    if ($rowsAffected > 0) {
        return redirect()->route('admin.dashboard')->with('valider', 'Teacher updated successfully');
    } else {
        return redirect()->route('admin.dashboard')->with('error', 'Failed to update');
    }
}



public function selectStudent(Request $request)
{
    return redirect()->route('addsoutenance', ['etudiant_id' => $request->etudiant_id]);
}
public function addsoutenance()
    {
        $enseignants = Enseignant::all();
        $etudiants = User::all();
        $salles = Sale::all();
        $jurys = Jury::all();

        $encadrent = null;
        if (request('etudiant_id')) {
            $etudiant = User::find(request('etudiant_id'));
            $encadrent = $etudiant ? $etudiant->enseignant : null;
        }

        return view('auth.addsoutenance', compact('enseignants', 'etudiants', 'salles', 'jurys', 'encadrent'));
    }

    public function create_soutenance(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'etudiant_id' => 'required|exists:users,id',
            'enseignant_id' => 'required|exists:enseignants,id',
            'salle_id' => 'required|exists:sales,id',
            'jury_id' => 'required|exists:juries,id',
        ]);
        //dd($request->all());
    
        $soutenance = new Soutenance([
            'date' => $request->input('date'),
            'etudiant_id' => $request->input('etudiant_id'),
            'enseignant_id' => $request->input('enseignant_id'),
            'salle_id' => $request->input('salle_id'),
            'jury_id' => $request->input('jury_id'),
        ]);
    
        $soutenance->save();
    
        return redirect()->route('showsoutenance')->with('success', 'Soutenance ajoutée avec succès.');
    }
    
    public function showsoutenance()
    {
        $donner = Soutenance::with(['etudiant', 'enseignant', 'jury', 'sale'])->get();
        return view('auth.soutenancetable', compact('donner'));
    }
    public function deletesoutenance($id)
    {
        DB::table('soutenances')->where('id',$id)->delete();
        return redirect()->route('showsoutenance');
    }
    public function editsoutenance($id){
        $data=Soutenance::select('*')->find($id);
        return view('Auth.editsoutenance',(['data'=>$data]));
    }
    public function updatesoutenance(Request $request, $id)
{
    $request->validate([
    'date' => 'required'    
    ]);

    $soutenance= [
        'date' => $request->input('date'),
        
    ];

    $rowsAffected = Soutenance::where('id', $id)->update($soutenance);

    if ($rowsAffected > 0) {
        return redirect()->route('showsoutenance')->with('valider', 'Soutenance updated successfully');
    } else {
        return redirect()->route('showsoutenance')->with('error', 'Failed to update');
    }
}
    public function addjury(){
        return view('auth.addjury');
    }
    public function storejury(Request $request){
        $request->validate([
            'name' => 'required',   
        ]);
    
        $jury = new Jury([
            'name' => $request->input('name'),
        ]);
    
        
        $jury->save();
    
        return redirect()->route('admin.dashboard')->with('success', 'jury added successfully');
    }
    public function addsalle(){
        return view('auth.addsalle');
    }
    public function storesalle(Request $request){
        $request->validate([
            'name' => 'required', 
            'department' => 'required',   
        ]);
    
        $jury = new Sale([
            'numero' => $request->input('name'),
            'department' => $request->input('department'),
        ]);
    
        
        $jury->save();
    
        return redirect()->route('admin.dashboard')->with('success', 'jury added successfully');
    }
    public function jury()
    {
        
        $data=Jury::select("*")->get();

        return view('auth.jury', compact('data'));
    }
    public function deletejury($id)
    {
        DB::table('juries')->where('id',$id)->delete();
        return redirect()->route('jury');
    }
    
}