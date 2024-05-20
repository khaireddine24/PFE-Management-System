@extends('auth.teacherdashboard')
@section('content')
<table class="table table-striped projects">
    <thead>
        <tr>
            <th style="width: 20%">
                date
           </th>
            <th style="width: 20%">
                 Etudiant
            </th>
            <th style="width: 20%">
              Jury
          </th>
            <th style="width: 10%">
              Salle
          </th>
        </tr>
    </thead>
    <tbody>
        @foreach($soutenances as $soutenance)
        <tr>
            <td>{{ $soutenance->date }}</td>
            <td>{{ $soutenance->etudiant->name }}</td>
            <td>{{ $soutenance->jury->name }}</td>
            <td>{{ $soutenance->sale->numero }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection