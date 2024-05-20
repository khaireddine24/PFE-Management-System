@extends('auth.admindashboard')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>update encadrent</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"> update Encadrent</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
        <div >
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <form method="POST" enctype="multipart/form-data" action="{{ route('updateens', $data['id']) }}">
                                    
                                    @csrf
                                    <label for="inputName">Name</label>
                                    <input type="text" value={{$data['name'] }} id="inputName" name='name'class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputClientCompany">email</label>
                                    <input type="email" name="email" value={{$data['email']}} id="inputClientCompany" class="form-control">
                                </div>
                                
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <div class="row">
                            <div class="col-12">
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Cancel</a>
                                <input type="submit" value="update Teacher" class="btn btn-success float-right">
                            </form>
                        </div>
                </div>
            </div>
        </div>
    @endsection
