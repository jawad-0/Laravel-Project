<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="shortcut icon" href="/images/logo2.jpg">
    <style>
        .body{
            /* background-image: url(/images/BG3.jpg);
            background-repeat: no-repeat;
            background-size: cover; */
        }
        .py-4 {
    /* background-color: rgb(226, 223, 223); */
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

    <!-- Venus Template -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Heebo:400,700|Oxygen:700" rel="stylesheet">
    <link rel="stylesheet" href="dist-venus/css/style.css">
    <script src="https://unpkg.com/scrollreveal@4.0.5/dist/scrollreveal.min.js"></script>

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
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        @can('admin-dashboard')
                        <li><a class="nav-link" href="{{ route('admin.index') }}">Admin Dashboard</a></li>
                        @endcan
                        @can('user-list')
                        <li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li>
                        @endcan
                        @can('role-list')
                        <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Roles</a></li>
                        @endcan
                        @can('product-list')
                        <li><a class="nav-link" href="{{ route('products.index') }}">Manage Products</a></li>
                        @endcan
                        
                        <li><a class="nav-link" href="{{ route('app2') }}">More Tables</a></li>
                        
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

        {{-- <main class="py-4">
            @yield('content')
            @include('header2')
        </main> --}}

    </div>

    <div class="body-wrap boxed-container">
        {{-- <header class="site-header text-light">
            <div class="container">
                <div class="site-header-inner">
                    <div class="brand header-brand">
                        <h1 class="m-0">
                            <a href="#">
								<img class="header-logo-image" src="dist-venus/images/logo.svg" alt="Logo">
                            </a>
                        </h1>
                    </div>
                </div>
            </div>
        </header> --}}

        <main>
            <section class="hero text-center text-light">
				<div class="hero-bg"></div>
				<div class="hero-particles-container">
					<canvas id="hero-particles"></canvas>
				</div>
                <div class="container-sm">
                    <div class="hero-inner">
						<div class="hero-copy">
	                        <h1 class="hero-title mt-0">Laravel First Project</h1>
	                        <p class="hero-paragraph"></p>
	                        <div class="hero-cta">
								<a class="button button-primary button-wide-mobile" href="{{ route('app2') }}">TABLES >>></a>
							</div>
						</div>
						<div class="mockup-container">
							<div class="mockup-bg">
								<img src="dist-venus/images/iphone-hero-bg.svg" alt="iPhone illustration">
							</div>
							<img class="device-mockup" src="dist-venus/images/iphone-hero.png" alt="iPhone Hero">
						</div>
                    </div>
                </div>
            </section>

			<section class="features-extended section">
                <div class="features-extended-inner section-inner">
					<div class="features-extended-wrap">
						<div class="container">
							<div class="feature-extended">
								<div class="feature-extended-image">
									<div class="mockup-bg">
										<img src="dist-venus/images/iphone-feature-bg-01.svg" alt="iPhone Feature 01 illustration">
									</div>
									<img class="device-mockup is-revealing" src="dist-venus/images/iphone-feature-01.png" alt="iPhone Feature 01">
								</div>
								<div class="feature-extended-body is-revealing">
									<h3 class="mt-0 mb-16">Amazing features, coming soon.</h3>
									<p class="m-0">Quam quisque id diam vel quam elementum pulvinar. Ut etiam sit amet nisl purus in mollis nunc. Odio morbi quis commodo odio aenean sed adipiscing diam donec.</p>
								</div>
							</div>
							<div class="feature-extended">
								<div class="feature-extended-image">
									<div class="mockup-bg">
										<img src="dist-venus/images/iphone-feature-bg-02.svg" alt="iPhone Feature 02 illustration">
									</div>
									<img class="device-mockup is-revealing" src="dist-venus/images/iphone-feature-02.png" alt="iPhone Feature 02">
								</div>
								<div class="feature-extended-body is-revealing">
									<h3 class="mt-0 mb-16">Amazing features, coming soon.</h3>
									<p class="m-0">Quam quisque id diam vel quam elementum pulvinar. Ut etiam sit amet nisl purus in mollis nunc. Odio morbi quis commodo odio aenean sed adipiscing diam donec.</p>
								</div>
							</div>
							<div class="feature-extended">
								<div class="feature-extended-image">
									<div class="mockup-bg">
										<img src="dist-venus/images/iphone-feature-bg-03.svg" alt="iPhone Feature 03 illustration">
									</div>
									<img class="device-mockup is-revealing" src="dist-venus/images/iphone-feature-03.png" alt="iPhone Feature 03">
								</div>
								<div class="feature-extended-body is-revealing">
									<h3 class="mt-0 mb-16">Amazing features, coming soon.</h3>
									<p class="m-0">Quam quisque id diam vel quam elementum pulvinar. Ut etiam sit amet nisl purus in mollis nunc. Odio morbi quis commodo odio aenean sed adipiscing diam donec.</p>
								</div>
							</div>
							<div class="feature-extended">
								<div class="feature-extended-image">
									<div class="mockup-bg">
										<img src="dist-venus/images/iphone-feature-bg-04.svg" alt="iPhone Feature 04 illustration">
									</div>
									<img class="device-mockup is-revealing" src="dist-venus/images/iphone-feature-04.png" alt="iPhone Feature 04">
								</div>
								<div class="feature-extended-body is-revealing">
									<h3 class="mt-0 mb-16">Amazing features, coming soon.</h3>
									<p class="m-0">Quam quisque id diam vel quam elementum pulvinar. Ut etiam sit amet nisl purus in mollis nunc. Odio morbi quis commodo odio aenean sed adipiscing diam donec.</p>
								</div>
							</div>
						</div>
					</div>
                </div>
            </section>
        </main>

		<footer class="site-footer">
			<div class="footer-particles-container">
				<canvas id="footer-particles"></canvas>
			</div>
			<div class="site-footer-top">
				<section class="cta section text-light">
					<div class="container-sm">
						<div class="cta-inner section-inner">
							<div class="cta-header text-center">
								<h2 class="section-title mt-0">Stay in the know</h2>
								<p class="section-paragraph">Lorem ipsum is common placeholder text used to demonstrate the graphic elements of a document or visual presentation.</p>
								<div class="cta-cta">
									<a class="button button-primary button-wide-mobile" href="#">Get early access</a>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			<div class="site-footer-bottom">
				<div class="container">
					<div class="site-footer-inner">
						<div class="brand footer-brand">
							<a href="#">
								<img src="dist-venus/images/logo.svg" alt="Venus logo">
							</a>
						</div>
						<ul class="footer-links list-reset">
							<li>
								<a href="#">Contact</a>
							</li>
							<li>
								<a href="#">About us</a>
							</li>
							<li>
								<a href="#">FAQ's</a>
							</li>
							<li>
								<a href="#">Support</a>
							</li>
						</ul>
						<ul class="footer-social-links list-reset">
							<li>
								<a href="#">
									<span class="screen-reader-text">Facebook</span>
									<svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
										<path d="M6.023 16L6 9H3V6h3V4c0-2.7 1.672-4 4.08-4 1.153 0 2.144.086 2.433.124v2.821h-1.67c-1.31 0-1.563.623-1.563 1.536V6H13l-1 3H9.28v7H6.023z" fill="#FFF"/>
									</svg>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="screen-reader-text">Twitter</span>
									<svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
										<path d="M16 3c-.6.3-1.2.4-1.9.5.7-.4 1.2-1 1.4-1.8-.6.4-1.3.6-2.1.8-.6-.6-1.5-1-2.4-1-1.7 0-3.2 1.5-3.2 3.3 0 .3 0 .5.1.7-2.7-.1-5.2-1.4-6.8-3.4-.3.5-.4 1-.4 1.7 0 1.1.6 2.1 1.5 2.7-.5 0-1-.2-1.5-.4C.7 7.7 1.8 9 3.3 9.3c-.3.1-.6.1-.9.1-.2 0-.4 0-.6-.1.4 1.3 1.6 2.3 3.1 2.3-1.1.9-2.5 1.4-4.1 1.4H0c1.5.9 3.2 1.5 5 1.5 6 0 9.3-5 9.3-9.3v-.4C15 4.3 15.6 3.7 16 3z" fill="#FFF"/>
									</svg>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="screen-reader-text">Google</span>
									<svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
										<path d="M7.9 7v2.4H12c-.2 1-1.2 3-4 3-2.4 0-4.3-2-4.3-4.4 0-2.4 2-4.4 4.3-4.4 1.4 0 2.3.6 2.8 1.1l1.9-1.8C11.5 1.7 9.9 1 8 1 4.1 1 1 4.1 1 8s3.1 7 7 7c4 0 6.7-2.8 6.7-6.8 0-.5 0-.8-.1-1.2H7.9z" fill="#FFF"/>
									</svg>
								</a>
							</li>
						</ul>
						<div class="footer-copyright">&copy; 2018 Venus, all rights reserved</div>
					</div>
				</div>
			</div>
        </footer>
    </div>

    <script src="dist-venus/js/main.min.js"></script>

</body>
</html>
