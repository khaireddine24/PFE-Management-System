@extends('auth.admindashboard')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Jury</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')  }}">Home</a></li>
            <li class="breadcrumb-item active">Jury</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
<br><br><a href="{{ route('addjury') }}" class="btn btn-success float-end">Add Jury</a><br><br><br>
<div class="row">
    @foreach ($data as $jury)
    <div class="col-lg-3 col-8">
        <div class="small-box d-flex flex-column justify-content-between" style="width: 15rem; height: 190px;">
            <div class="inner ">
                <h2 class="border p-2">{{ $jury->name }}</h2> 
            </div>
            <div class="footer mt-auto">
                <a href="{{ route('deletejury',$jury->id) }}" class="btn btn-danger btn-sm">Delete</a>
            </div>
        </div>
    </div>
    
    @endforeach
</div>
@endsection
