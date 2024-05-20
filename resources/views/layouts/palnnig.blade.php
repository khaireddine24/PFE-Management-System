@extends('layouts.app')

@section('content')
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div class="container">
    <div class="d-flex ml-44 justify-content-start flex-wrap">
        <div class=" ml-14 card me-16 mb-3" style="width: 25rem; height: 420px;">
            <img style="width: 25rem; height: 300px;" src="{{ asset('images_profil/diplome-de-fin-detudes.PNG') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="h2 card-text"><a href="{{route('studentsoutenance')  }}">Soutenance Planing</a></p>
            </div>
        </div>
        <div class="card me-16 mb-3" style="width: 25rem; height: 420px;">
            <img style="width: 25rem; height: 300px;" src="{{ asset('images_profil/validation.PNG') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h2 class="card-text h2"><a href="{{ route('mafiche') }}"> validation Record</a></h2>
            </div>
        </div>
    </div>
</div>
@endsection
