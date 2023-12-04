<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="shortcut icon" href="/images/logo2.jpg">
    <style>
        .body{
            background-image: url(/images/BG3.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }

        a{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        .nav-link{
            font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-weight: bold;
        }

        .nav-item1{
            margin-left: 930px ;   
        }
        
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>✦✦ SK PROJECT ✦✦</title>
    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

</head>
<body class="body">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('app2') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item1">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item2">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('REGISTER') }}</a>
                                </li>
                            @endif
                        @else
                        @can('admin-dashboard')
                        <li><a class="nav-link" href="{{ route('admin.index') }}"><b>➤ Admin Dashboard</b></a></li>
                        @endcan
                        @can('user-list')
                        <li><a class="nav-link" href="{{ route('users.index') }}"><b>➤ Manage Users</b></a></li>
                        @endcan
                        @can('role-list')
                        <li><a class="nav-link" href="{{ route('roles.index') }}"><b>➤ Manage Roles</b></a></li>
                        @endcan
                        {{-- @can('product-list')
                        <li><a class="nav-link" href="{{ route('products.index') }}">Manage Products</a></li>
                        @endcan --}}
                        
                        <li><a class="nav-link" href="{{ route('app2') }}"><b>➤ Manage Tables</b></a></li>
						<li><a class="nav-link" href="#"
                           onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <b>{{ __('- LOGOUT -') }}</b>
							</a></li>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
                            {{-- <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('app2') }}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    More Tables
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li> --}}

                        @endguest
                    </ul>
                </div>
                    {{-- <div>
                    <button><a href="/company">Company</a></button>
                    <button><a href="/employee">Employee</a></button>
                    </div>  --}}
            </div>
        </div>
        </nav>

        <main class="py-4">
            @yield('content')
            {{-- @include('header2') --}}
        </main>

    </div>

</body>
</html>
