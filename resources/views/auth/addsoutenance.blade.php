@extends('auth.admindashboard')
@section('content')
<form method="POST" action="{{ route('soutenance.selectStudent') }}">
    @csrf
    
    <div class="form-group">
        <label>Etudiant</label>
        <select id="etudiant" name="etudiant_id" class="form-control select2" style="width: 100%;" onchange="this.form.submit()">
            <option value="">Selectionner l'etudiant</option>
            @foreach($etudiants as $etudiant)
                <option value="{{ $etudiant->id }}" {{ request('etudiant_id') == $etudiant->id ? 'selected' : '' }}>{{ $etudiant->name }}</option>
            @endforeach
        </select>
    </div>
</form>
<form method="POST" action="{{ route('create_soutenance') }}">
    @csrf
    
    <input type="hidden" name="etudiant_id" value="{{ request('etudiant_id') }}">
    <div class="form-group">
        <label>Encadrent</label>
        <select id="enseignant" name="enseignant_id" class="form-control select2" style="width: 100%;">
            <option value="">Selectionner l'encadrent</option>
            @if(request('etudiant_id') && $encadrent)
                <option value="{{ $encadrent->id }}" selected>{{ $encadrent->name }}</option>
            @endif
        </select>
    </div>
    <div class="form-group">
        <label for="date">Date</label>
        <input type="date" name="date" class="form-control" value="{{ old('date') }}" required>
    </div>
    <div class="form-group">
        <label>Jury</label>
        <select name="jury_id" class="form-control select2" style="width: 100%;">
            <option value="">Selectionner jury</option>
            @foreach($jurys as $jury)
                <option value="{{ $jury->id }}">{{ $jury->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Salle</label>
        <select name="salle_id" class="form-control select2" style="width: 100%;">
            <option value="">Selectionner salle</option>
            @foreach($salles as $salle)
                <option value="{{ $salle->id }}">{{ $salle->numero }}</option>
            @endforeach
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Ajouter Soutenance</button>
</form>
@endsection
