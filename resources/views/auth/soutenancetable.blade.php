@extends('auth.admindashboard')
@section('content')
@if(session('success'))
    <div class="alert alert-success" id="success-alert">
      {{ session('success') }}
    </div>
    @endif
    @if(session('valider'))
    <div class="alert alert-success" id="update-alert">
        {{ session('valider') }}
    </div>
    {{ session()->forget('valider') }}
    @endif
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
      $("#update-alert").slideDown(500).delay(1800).slideUp(500, function() {
            $(this).remove();
        });
        $("#success-alert").slideDown(500).delay(1800).slideUp(500, function() {
            $(this).remove();
        });
    });
</script>
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h2>Soutenance</h2>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Soutenanace</li>
        </ol>
      </div>
    </div>
  </div>
<table class="table table-striped projects">
    <thead>
        <tr>
            <th style="width: 10%">
                date
           </th>
            <th style="width: 10%">
                 Etudiant
            </th>
           
            <th style="width: 10%">
                Encadrent
            </th>
            <th style="width: 10%">
              Jury
          </th>
            <th style="width: 10%">
              Salle
            </th>
            <th style="width: 10%">
              Action to edit
            </th>
            <th style="width: 10%">
              Action to delete
            </th>
        </tr>
    </thead>
    <tbody>
        @if (!$donner->isEmpty())
        @foreach ($donner as $soutenance)
        <tr>
            <td>{{ $soutenance->date }}</td>
            <td>{{ $soutenance->etudiant->name }}</td>
            <td>{{ $soutenance->enseignant->name }}</td>
            <td>{{ $soutenance->jury->name }}</td>
            <td>{{ $soutenance->sale->numero }}</td>
            <td class="project-actions text-left">
                          
              <a class="btn btn-info btn-sm" href="{{ route('editsoutenance',$soutenance->id)}}">
                  <i class="fas fa-pencil-alt">
                  </i>
                  Update
              </a>
            </td>
            <td class="project-actions text-left">
              <a class="btn btn-danger btn-sm" href="{{ route('deletesoutenance',$soutenance->id)}}">
                  <i class="fas fa-trash">
                  </i>
                  Delete
              </a>
            </td>
          
        </tr>
        @endforeach
        @endif
    </tbody>
</table>



@endsection