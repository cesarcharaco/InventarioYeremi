<div id="preloader">
		<div class="loader-container">
			<div class="progress-br float shadow">
				<div class="progress__item"></div>
			</div>
		</div>
	</div>
<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.html">
					<img src="{{ asset('etar/images/etar/DISTINTIVO_SF.png') }}" height="57px" width="50px" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-host">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="{{ route('home_portal')}}">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="{{ route('nosotros')}} ">Nosotros</a></li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Áreas </a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="{{ route('curso2')}} ">Secundaria</a>
								<a class="dropdown-item" href="{{ route('curso3')}} ">Producción Pecuaria</a>
								<a class="dropdown-item" href="{{ route('curso4')}} ">Técnico en Alimento</a>
								<a class="dropdown-item" href="{{ route('curso5')}} ">Ciencias Agrícolas</a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Blog </a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="{{ route('blog')}} ">Blog ETA</a>
								<a class="dropdown-item" href="{{ route('blogs')}} ">Blog Simple ETA</a>
							</div>
						</li>
						<li class="nav-item"><a class="nav-link" href="{{ route('profesores')}} ">Profesores</a></li>
						<!-- <li class="nav-item"><a class="nav-link" href="pricing.html">Pricing</a></li> -->
						<li class="nav-item"><a class="nav-link" href="{{ route('contacto')}} ">Contacto</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
                        <li><a class="hover-btn-new log orange" href="#" data-toggle="modal" data-target="#login"><span>DACE</span></a></li>
                    </ul>
				</div>
			</div>
		</nav>
	</header>