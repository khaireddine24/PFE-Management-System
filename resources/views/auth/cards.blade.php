@extends('auth.admindashboard')
@section('content')
<br><br><div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{ $StudentCount }}</h3>

          <p>Students</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{ $TeachersCount }}</h3>

          <p>Encadrents</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="{{ route('admin.ens') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{ $SoutenanceCount }}</h3>

          <p>Soutenances</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div><br><br><br>
  <br>
  <br>
  <div class="row">
    
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box hover: " style="width: 15rem; height: 190px;background: linear-gradient(to top, #09203f 0%, #537895 100%);">
        <div class="inner">
          <h2>
            <a class="link-light" href="{{ route('addsoutenance') }}" style="font-size: 1.1em;color:white">
                Add Soutenance
            </a>
        </h2>
        
        </div>
        <div class="icon">
          <i class=""></i>
        </div>
        
      </div>
    </div>
    <div class="col-lg-3 col-6  " style="">
      <!-- small box -->
      <div class="small-box "style="width: 15rem; height: 190px;background: linear-gradient(to top, #09203f 0%, #537895 100%);">
        <div class="inner">
          <h2><a class="link-light" href="{{ route('addjury') }}" style="font-size: 1.1em;color:white">
            Add Jury
        </a></h2>
          
        </div>
        <div class="icon">
          <i class=""></i>
        </div>
        
      </div>
    </div>
    <div class="col-lg-3 col-6 ">
      <!-- small box -->
      <div class="small-box "style="width: 15rem; height: 190px;background: linear-gradient(to top, #09203f 0%, #537895 100%);">
        <div class="inner">
          <h3></h3>

          <h2><a class="link-light" href="{{ route('addsalle') }}" style="font-size: 1.1em;color:white">
            Add Sale
        </a></h2>
        </div>
        <div class="icon">
          <i class=""></i>
        </div>
        
      </div>
    </div>
    <!-- ./col -->
  </div> 

@endsection