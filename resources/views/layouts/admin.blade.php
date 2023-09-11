 <!doctype html>
 <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">

 	<!-- CSRF Token -->
 	<meta name="csrf-token" content="{{ csrf_token() }}">

 	<title>{{ config('app.name', 'Laravel') }}</title>

 	<!-- Fontawesome 6 cdn -->
 	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css' integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==' crossorigin='anonymous' referrerpolicy='no-referrer' />

 	<!-- Fonts -->
 	<link rel="dns-prefetch" href="//fonts.gstatic.com">
 	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

 	<!-- Usando Vite -->
 	@vite(['resources/js/app.js'])
 </head>

 <body>
 	<div id="app">
        @include('layouts.header')
 		<div id="adminContainer" class="container-fluid">

			{{-- Sidebar --}}
 			<div class="row sidebarContainer">
 				<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar castomDashbord">
 					<div class="position-sticky pt-3">
 						<ul id="adminLeftMenu" class="nav flex-column">

 							<li class="nav-item rounded">
 								<a class="nav-link text-body-secondary py-3" href="/">
 									<i class="fa-solid fa-home-alt fa-lg fa-fw me-3"></i> Home
 								</a>
 							</li>

 							<li class="nav-item rounded">
 								<a class="nav-link text-body-secondary py-3 {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg-orange rounded' : '' }}" href="{{route('admin.dashboard')}}">
 									<i class="fa-solid fa-tachometer-alt fa-lg fa-fw me-3"></i> Dashboard
 								</a>
 							</li>

							<li class="nav-item rounded">
								<a class="nav-link text-body-secondary py-3 {{ Route::currentRouteName() == 'admin.apartments.index' ? 'bg-orange rounded' : '' }}" href="{{route('admin.apartments.index')}}">
									<i class="fa-solid fa-building-user  fa-lg fa-fw me-3"></i> Your apartments
								</a>
							</li>

							<li class="nav-item rounded">
								<a class="nav-link text-body-secondary py-3 {{ Route::currentRouteName() == 'admin.apartments.create' ? 'bg-orange rounded' : '' }}" href="{{route('admin.apartments.create')}}">
									<i class="fa-solid fa-plus fa-lg fa-fw me-3"></i> Add apartment
								</a>
							</li>

                            <li class="nav-item rounded">
								<a class="nav-link text-body-secondary py-3 {{ Route::currentRouteName() == 'admin.messages.index' ? 'bg-orange rounded' : '' }}" href="{{route('admin.messages.index')}}">
									<i class="fa-solid fa-envelope fa-lg fa-fw me-3"></i> Messages
								</a>
							</li>

 							<li class="nav-item rounded">
 								<a class="nav-link text-body-secondary py-3" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
 									<i class="fa-solid fa-sign-out-alt fa-lg fa-fw me-3"></i> {{ __('Logout') }}
 								</a>
 								<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
 									@csrf
 								</form>
 							</li>

 						</ul>

 					</div>
 				</nav>

 				<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 castomMain">
 					@yield('content')
 				</main>
 			</div>
 		</div>

 	</div>
 </body>

 </html>

 <style scoped>

	/* MEDIA QUERY */
	
	@media (max-width: 992px) {
		#sidebarMenu{
			display: none !important;
		}

		.castomMain{
			width: 100vw;
		}
	}
	
	</style>
