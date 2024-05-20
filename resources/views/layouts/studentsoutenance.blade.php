@extends('layouts.app')

@section('content')
<br>
<h1>Information soutenance</h1><br><br>
@if ($soutenance)
<table class="table table-striped">
    <thead class="table-dark">
        <th style="width: 20%">
            Date
        </th>
        
    <th style="width: 20%">
        Encadrent
    </th>
    <th style="width: 20%">
      Jury
  </th>
    <th style="width: 10%">
      Salle
  </th>
</thead>
    <tbody>
        <tr>
            <td>{{ $soutenance->date }}</td>
            <td>{{ $soutenance->enseignant->name }}</td>
            <td>{{ $soutenance->jury->name }}</td>
            <td>{{ $soutenance->sale->numero }}</td>
        </tr>
    </tbody>
</table>
@else
<p>Aucune soutenance trouvée.</p>
@endif
</div>
@endsection