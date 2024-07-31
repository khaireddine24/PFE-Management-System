<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PFE Management</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            /* Tailwind CSS */
            @import url('https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css');

            /* Background Animation */
            @keyframes gradientBackground {
                0% {
                    background-position: 0% 50%;
                }
                50% {
                    background-position: 100% 50%;
                }
                100% {
                    background-position: 0% 50%;
                }
            }

            .animated-bg {
                background: url('images/Graduation.png') no-repeat center center;
                background-size: cover;
                animation: gradientBackground 15s ease infinite;
                width: 100%;
                height: 100%;
                position: absolute;
                top: 0;
                left: 0;
                z-index: -1;
            }

            .link-card {
                display: flex;
                flex-direction: column;
                align-items: center;
                background: rgba(255, 255, 255, 0.8);
                padding: 1rem;
                border-radius: 0.5rem;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                transition: transform 0.2s, box-shadow 0.2s;
                text-align: center;
                margin: 1rem;
            }

            .link-card:hover {
                transform: scale(1.05);
                box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
            }

            .link-img {
                width: 50px;
                height: auto;
                margin-bottom: 0.5rem;
            }

            .link-text {
                font-size: 1rem;
                color: #333;
                text-decoration: none;
            }

            .title {
                font-size: 2rem;
                color: white;
                margin-bottom: 2rem;
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            }

            .content {
                position: relative;
                z-index: 10;
                text-align: center;
            }

            .overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                z-index: 1;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="animated-bg"></div>
        <div class="overlay"></div>
        <div class="relative flex flex-col justify-center items-center min-h-screen selection:bg-red-500 selection:text-white">
            <div class="content">
                <h1 class="title">Welcome to the Platform</h1>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="link-card">
                            <img src="images/user.png" alt="Dashboard" class="link-img">
                            <span class="link-text">Dashboard</span>
                        </a>
                    @else
                        <div class="flex flex-wrap justify-center">
                            <!-- Student -->
                            <div class="m-2">
                                <a href="{{ route('login') }}" class="link-card">
                                    <img src="images/user.png" alt="Log in" class="link-img">
                                    <span class="link-text">Login Student</span>
                                </a>
                            </div>
    
                            <!-- Teacher -->
                            <div class="m-2">
                                <a href="{{ route('teacher.login') }}" class="link-card">
                                    <img src="images/Teacher.png" alt="Log in Teacher" class="link-img">
                                    <span class="link-text">Login Teacher</span>
                                </a>
                                @if (Route::has('teacher.register'))
                                    <a href="{{ route('teacher.register') }}" class="link-card mt-2">
                                        <img src="images/teacher-register.png" alt="Register Teacher" class="link-img">
                                        <span class="link-text">Register Teacher</span>
                                    </a>
                                @endif
                            </div>
    
                            <!-- Admin -->
                            <div class="m-2">
                                <a href="{{ route('admin.login') }}" class="link-card">
                                    <img src="images/AdminRo.png" alt="Log in Admin" class="link-img">
                                    <span class="link-text">Login Admin</span>
                                </a>
                                @if (Route::has('admin.register'))
                                    <a href="{{ route('admin.register') }}" class="link-card mt-2">
                                        <img src="images/admin-register.png" alt="Register Admin" class="link-img">
                                        <span class="link-text">Register Admin</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endauth
                @endif
            </div>
        </div>
    </body>
</html>
