<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('css/Fiche_PFE.css') }}"/>
        <link rel="icon" href="images/Student.png"/>
        <title>Student</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class=" bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header >
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
        </div><br>
        <div style="text-align: center; background-color: #f9f9f9; border-radius: 10px; padding: 10px; font-family: Arial, sans-serif; color: #333;">
            <h1 style="margin-bottom: 7px;font-size:40px">🎓 <span style="color: #2c3e50;">Welcome to Your Student Dashboard</span> 🎓</h1>
            <h2 style="margin-top: 0; font-weight: normal;font-size:20px; color: #7f8c8d;">Your Gateway to Learning and Success!</h2>
        </div>      
            <main style="">
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
                @yield('content')
            </main><br>
            
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>