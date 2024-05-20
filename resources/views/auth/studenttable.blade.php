@extends('auth.teacherdashboard')
@section('content')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Students</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('teacher.dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Students</li>
        </ol>
      </div>
    </div>
  </div>
<table class="table table-striped projects">
              <thead>
                  <tr>
                      
                      <th style="width: 20%">
                          Nom Etudiant
                      </th>
                     
                      <th style="width: 20%">
                          email
                      </th>
                      <th style="width: 20%">
                        image
                    </th>
                      <th style="width: 10%">
                        Fiche de l'etudiant(e)
                    </th>
                  </tr>
              </thead>
              
              <tbody>
                @if (!$data->isEmpty())
                    @foreach ($data as $info)
                        <tr>
                            <td>{{ $info->name }}</td>
                            <td>{{ $info->email }}</td>
                            <td>  <img src="{{ asset('images_profil/' . $info->image) }}" style="width:50px;height:50px;" alt="Profile Image"></td>
                            <td>
                                @if (!empty($info->latest_fiche))
                                <a class="btn btn-info btn-sm" href="{{ route('updateformfiche', ['id' => $info->latest_fiche->id]) }}">
                                    <i class="fas fa-pencil-alt"></i> Fiche
                                </a>
                            @else
                                <span class="text-muted">No fiche available</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">
                        <h1>No data found</h1>
                    </td>
                </tr>
            @endif      
                            
            </tbody>
            
            </table>
            @endsection