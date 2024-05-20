@extends('auth.admindashboard')
@section('content')
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
                        <form method="POST"  action="{{ route('storejury') }}">
                            
                            @csrf
                            <label for="inputName">Name</label>
                            <input type="text"  id="inputName" name='name'class="form-control">
                        </div>
                        
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="create jury" class="btn btn-success float-right">
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection