@extends('auth.admindashboard')
@section('content')
<br><br>
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $StudentCount }}</h3>
                <p>Students</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-graduate"></i>
            </div>
            <a href="#" class="small-box-footer">&nbsp;</a>
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
                <i class="fas fa-chalkboard-teacher"></i>
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
                <i class="fas fa-chalkboard"></i>
            </div>
            <a href="{{ route('showsoutenance') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
<br><br><br>
<br>
<br>
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box" style="width: 15rem; height: 190px;background: linear-gradient(to top, #09203f 0%, #537895 100%);">
            <div class="inner">
                <h2>
                    <a class="link-light" href="{{ route('addsoutenance') }}" style="font-size: 1.1em;color:white">
                        Add Soutenance
                        <div class="icon">
                          <i class="fas fa-plus-square"></i>
                      </div>
                    </a>
                </h2>
            </div>
            
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box" style="width: 15rem; height: 190px;background: linear-gradient(to top, #09203f 0%, #537895 100%);">
            <div class="inner">
                <h2>
                    <a class="link-light" href="{{ route('addjury') }}" style="font-size: 1.1em;color:white">
                        Add Jury
                        <div class="icon">
                          <i class="fas fa-users"></i>
                      </div>
                    </a>
                </h2>
            </div>
            
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box" style="width: 15rem; height: 190px;background: linear-gradient(to top, #09203f 0%, #537895 100%);">
            <div class="inner">
                <h2>
                    <a class="link-light" href="{{ route('addsalle') }}" style="font-size: 1.1em;color:white">
                        Add Salle
                        <div class="icon">
                          <i class="fas fa-door-open"></i>
                      </div>
                    </a>
                </h2>
            </div>
        </div>
    </div>
    <!-- ./col -->
</div>
@endsection
