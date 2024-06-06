<!-- resources/views/auth/admin-login.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Login</title>
    <link rel="icon" href="../images/Teacher.png"/>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- overlayScrollbars -->
    <link rel="stylesheet" >
    <style>
        @media screen and (max-width: 600px) {
  .card {
    margin: 0px;
  }
  .h6 {
    margin-bottom: 15px;
  }
}
@media screen and (max-width: 1200px) {
  .card {
    margin: 5px;
    padding: 5px;
  }
}
.h2 {
  color: #016450;
  letter-spacing: 5px;
  font-family: "Segoe UI";
  font-weight: 700;
  src: local("Segoe UI Bold");
  line-height: 3rem;
}
.h6 {
  color: #999999;
  padding-top: 15px;
  font-family: "Segoe UI";
  font-weight: 600;
  src: local("Segoe UI Semibold");
  letter-spacing: 5px;
}

.link {
  text-decoration: none;
  color: #016450;
  font-family: "Segoe UI";
  font-weight: 700;
  src: local("Segoe UI Bold");
  letter-spacing: 4.5px;
  margin-left: 5px;
}
.pad {
  padding-top: 150px;
}
.color {
  background-color: #016450;
  font-weight: bold;
  color: #ffffff;
}
.lsp {
  letter-spacing: 2.5px;
}
.weig1 {
  font-family: "Segoe UI";
  font-weight: 600;
  src: local("Segoe UI Semibold");
}
.weig2 {
  font-family: "Segoe UI";
  font-weight: 400;
  src: local("Segoe UI");
}
.pd {
  padding-right: 10rem;
  background-color: #ebebeb;
}
.brad {
  border-radius: 10px;
}
.form-control::placeholder {
  font-family: "Segoe UI";
  font-weight: 600;
  src: local("Segoe UI Semibold");
  color: #cacaca;
  opacity: 1;
}
    </style>
</head>
<body>
    

<div class="container-fluid my-5 p-5 card shadow-lg bg-white rounded border-0" style="width: auto;">
    <div class="row d-flex justify-content-between align-items-center py-lg-4 px-4">

        <div class="col-lg-6 d-none d-lg-block">
            <h2 class="h2">Teacher Login </h2>
            <img src="{{ asset('images/background login admin.jpg') }}" class="img-fluid pt-5" />
        </div>

        <div class="col-lg-4 mb-3">
            <!-- Log in Error Messages -->
            
            <!-- Log in form -->
            <h2 class="h2 d-lg-none">Login to Start Buying your</h2>
            <h2 class="h2 d-lg-none">Dream Home</h2>
            <h4 class="h2 text-center d-none d-lg-block">Log In</h4>
            <form method="post" action="{{ route('teacher.login') }}">
                @csrf
                <div class="mb-4 form-group">
                    <label for="email" class="form-label lsp weig1 mt-5">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="mt-2 pd py-4 lsp weig2 border-0 brad form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                      
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group">
                    <label for="password" class="form-label lsp weig1">Password</label>
                    <input type="password" class="form-control mt-2 py-4 pd lsp weig2 border-0 brad" id="password"
                        name="password" placeholder="******"
                        required />
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>

                <button type="submit" class="btn color px-5 lsp mt-5 shadow-lg" style="margin:auto;display:block">
                    {{ __('Login') }}
                </button>
                @if (Route::has('teacher.password.request'))
                    <a class="btn btn-link" href="{{ route('teacher.password.request') }}">
                          {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </form>

        </div>
    </div>
</div>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>