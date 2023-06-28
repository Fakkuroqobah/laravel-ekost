<!-- Header -->

	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header_content d-flex flex-row align-items-center justify-content-start">
						<div class="logo">
							<a href="{{ url('/') }}" style="
								font-family: boogaloo;
								font-size: 2.6em;
								color: #fff;
							">Kos'E</a>
						</div>
						<nav class="main_nav ml-auto">
							<ul>
								@guest
									<li><a href="{{ route('register') }}">DAFTAR</a></li>
									<li><a href="{{ route('register.pemilik') }}">GABUNG</a></li>
									<li><a href="{{ route('login') }}">LOGIN</a></li>
								@endguest
								@auth
									<li><a href="{{ route('pemesanan', Auth::user()->id) }}">PEMESANAN</a></li>
									<li class="nav-item dropdown">
								        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-transform: uppercase;">
								          	{{ Auth::user()->nama }}
								        </a>
										<div class="dropdown-menu" aria-labelledby="navbarDropdown">
											<a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
								        </div>
									</li>
								@endauth
							</ul>
						</nav>
						<div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<!-- Menu -->

	<div class="menu trans_500">
		<div class="menu_content d-flex flex-column align-items-center justify-content-center text-center">
			<div class="menu_close_container"><div class="menu_close"></div></div>
			<ul>
				@guest
					<li class="menu_item"><a href="{{ route('register') }}">DAFTAR</a></li>
					<li class="menu_item"><a href="{{ route('register.pemilik') }}">GABUNG</a></li>
					<li class="menu_item"><a href="{{ route('login') }}">LOGIN</a></li>
				@endguest
				@auth
					<li class="menu_item"><a href="">{{ Auth::user()->nama }}</a></li>
					<li class="menu_item"><a href="{{ route('pemesanan', Auth::user()->id) }}">PEMESANAN</a></li>
					<li class="menu_item"><a href="{{ route('logout') }}">LOGOUT</a></li>
				@endauth
			</ul>
		</div>
		<div class="menu_phone">Kos'E</div>
	</div>