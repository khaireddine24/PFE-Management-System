@extends('auth.admindashboard')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>ajouter enseignant</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">ajouter enseignant</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
    <form name="" action="{{ route('admin.createens') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="form-group">
            <label for="name">Nom de l'enseignant :</label>
            <input type="text" class="form-control" id="name" name="name" required>
            <div class="invalid-feedback">
                Veuillez entrer votre nom.
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email de l'enseignant :</label>
            <input type="email" class="form-control" id="email" name="email" required>
            <div class="invalid-feedback">
                Veuillez entrer une adresse email valide.
            </div>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe de l'enseignant :</label>
            <input type="password" class="form-control" id="password" name="password" required>
            <div class="invalid-feedback">
                Veuillez entrer un mot de passe.
            </div>
        </div><br>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Valider</button>
            <button type="reset" class="btn btn-secondary">Annuler</button>
        </div>
    </form>
    @endsection