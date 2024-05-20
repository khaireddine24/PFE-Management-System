@extends('auth.admindashboard')
@section('content')
<section class="content-header">
    @if(session('success'))
    <div class="alert alert-success" id="success-alert">
      {{ session('success') }}
    </div>
    @endif
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#success-alert").slideDown(500).delay(1800).slideUp(500, function() {
            $(this).remove();
        });
    });
</script>
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Encadrent</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Encadrent</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
<br><br><a href="{{ route('admin.formaddenseignant') }}" class="btn btn-success float-end">Add Enseignant</a><br>
    <table class="table mt-5">
        <thead>
            <tr >
                <th style="width: 50%">Name</th>
                <th style="width: 50%">Email</th>
                <th style="width: 25%">Actions</th>
            </tr>
        </thead>
        <tbody>
            @if (!@empty($data))
                @foreach ($data as $info)
                    <tr>
                        <td>{{ $info->name }}</td>
                        <td>{{ $info->email }}</td>
                        <td class="text-end">
                            <a href="{{ route('updateform',$info->id) }}" class="btn btn-info btn-sm">
                                Update
                            </a><br>
                            <a href="{{ route('deleteens',$info->id) }}" class="btn btn-danger btn-sm">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3" class="text-center">No data found</td>
                </tr>
            @endif
        </tbody>
    </table>

@endsection