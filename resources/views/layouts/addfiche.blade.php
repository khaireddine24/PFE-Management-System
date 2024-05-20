@extends('layouts.app')
@section('content')
<center>
<div class="card" style="width: 65rem;" >
    <span class="title">Fiche PFE</span>
    <form class="form" name="F" method="POST" action="{{ route('fiche.store') }}">
      @csrf
      <select class="form-select rounded"  name="enseignant_id">
<option selected disabled>Choisir l'enseignant</option>
@if($enseignant)
            <option selected value="{{ $enseignant->id }}">{{ $enseignant->name }}</option>
        @endif

</select>
<br><br>
<select class="form-select rounded" name="etudiant_id">
<option selected disabled>Choisir l'étudiant</option>
<option value="{{  Auth::id() }}" selected>{{ Auth::user()->name }}</option>
</select>

<br><br>
      <div class="group">
        <input placeholder="‎" type="text" name="societe_acceuil" required="">
        <label for="name">Societe d'acceuil</label>
      </div>

      <div class="group">
        <input placeholder="‎" type="text" id="enc" name="encadrant_externe" required="">
        <label for="enc">Encadrant externe</label>
      </div>

      <div class="group">
        <input placeholder="‎" type="text" id="tel" name="ntel_societe" required="">
        <label for="tel">Numero tel de Societe </label>
      </div>

      <div class="group">
        <input placeholder="‎" type="email" id="email" name="mail_societe" required="">
        <label for="email">Email Societe</label>
      </div>

      <div class="group">
        <input placeholder="‎" type="text" id="tit" name="intitule_pfe" required="">
        <label for="tit">Intitulé du PFE</label>
      </div>

       <div class="group">
        <textarea placeholder="‎" id="bes" name="besions_fonctionnels" rows="5" required=""></textarea>
        <label for="bes">Besion fonctionnels</label>
      </div>

      <div class="group">
        <textarea placeholder="‎" id="tech" name="technologies_utilisees" rows="5" required=""></textarea>
        <label for="tech">Technologies utilisees</label>
      </div>

      <div class="rad">
            Langue:
            <input name="langue" type="radio" value="Francais"/> Francais
            <input name="langue" type="radio" value="Anglais"/> Anglais
    </div>

      
      <button type="submit">Submit</button><br>

    </form>
      
</div>
</center>
@endsection