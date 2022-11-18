<?php

require 'config/database.php';
require 'config/config.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>AUTOS MOTORS PLUS OFICIAL</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/flexslider.css">
	<link rel="stylesheet" href="fonts/icomoon/style.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">

	<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700" rel="stylesheet">


</head>
<body data-spy="scroll" data-target="#pb-navbar" data-offset="200">
<header>
	<div class="navbar navbar-expand-lg navbar-dark bg-dark ">
		<div class="container">
		  <a href="index.php" class="navbar-brand d-flex align-items-center">
			<strong>Motors Plus</strong>
		  </a>
		  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
	
			<div class="collapse navbar-collapse" id="navbarHeader">
				<ul class="navbar-nav me-auto mb-2 mb-b mb-lg-0">
					<li class="nav-item"><a href="index.php" class="nav-link  active">Inicio</a></li>
					
					<li class="nav-item"><a href="deportivos.php" class="nav-link">Deportivos</a></li>
					<li class="nav-item"><a href="trailers.php" class="nav-link">Trailers</a></li>
					<li class="nav-item"><a href="pickup.php" class="nav-link">Pick UP</a></li>
					<li class="nav-item"><a href="sedanes.php" class="nav-link">Sedanes</a></li>
					<li class="nav-item"><a href="suv.php" class="nav-link">SUV</a></li>
	
	
				</ul>
	
				<a href="checkout.php" class="btn btn-primary">
					Carrito <span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span>
				</a>
				<a href="Controlador/salir.php" class="btn btn-warning">
					cerrar <span id="cerrar" class="btn bg-warning">
				</a>				
			</div>
		</div>
	  </div>
</header>
	<section class="site-hero" style="background-image: url(images/img01f.jpg);" id="section-home" data-stellar-background-ratio="0.5">
		<div class="container">
			<div class="row intro-text align-items-center justify-content-center">
				<div class="col-md-10 text-center pt-5">

					<h1 class="site-heading site-animate">Bienvenidos a <strong class="d-block">MOTORS PLUS</strong></h1>
					<strong class="d-block text-white text-uppercase letter-spacing">Autos</strong>

				</div>
			</div>
		</div>
	</section> <!-- section -->

<!-- imagenes -->
<div>
	<img src="images/ca01.jpg" class="img-thumbnail" alt="...">
</div>

<div>
	<img src="images/ca02.jpg" class="img-thumbnail" alt="...">
</div>

<div>
	<img src="images/ca03.jpg" class="img-thumbnail" alt="...">
</div>

<!-- AUTORES -->
<div class="bg-black">
	<div class="card-group">
		<div class="card">
		  <img src="images/imgautores/profile03.jpeg" class="card-img-top" alt="...">
		  <div class="card-body">
			<h5 class="card-title"><small class="text-muted">Ingeniero</small></h5>
			<p class="card-text"><small class="text-muted">Diego Emmanuel Rodriguez</small></p>
			<p class="card-text"><small class="text-muted">Programador Web</small></p>
		  </div>
		</div>
		<div class="card">
		  <img src="images/imgautores/profile02.jpeg" class="card-img-top" alt="...">
		  <div class="card-body">
			<h5 class="card-title"><small class="text-muted">Ingeniera</small></h5>
			<p class="card-text"><small class="text-muted">Monica Isabel Pedroza</small></p>
			<p class="card-text"><small class="text-muted">Programadora Web</small></p>
		  </div>
		</div>
		<div class="card">
		  <img src="images/imgautores/profile01.jpg" class="card-img-top" alt="...">
		  <div class="card-body">
			<h5 class="card-title"><small class="text-muted">Ingeniero</small></h5>
			<p class="card-text"><small class="text-muted">Jose Arturo Mendoza</small></p>
			<p class="card-text"><small class="text-muted">Programador Web</small></p>
		  </div>
		</div>
	  </div>
</div>
<!-- Link para la pagina -->
<br>
<div class="container">
	<div class="row">
		<div class="col-md-12 text-center pt-5">
		<a class="btn btn-danger sticky-md-bottom" href="https://youtu.be/LYJg_RiKqks" role="button">Link para el video</a>
		<br>
		<p>Si no funciona el enlce del boton copie el enlace</p>
		<h3>https://youtu.be/LYJg_RiKqks</h3>
		</div>
	</div>
</div>
<br>
<!-- Acerca de la pagina -->
	<section class="site-section" id="section-about">
		<div class="container">
			<div class="row mb-5 align-items-center">
				<div class="col-lg-7 pr-lg-5 mb-5 mb-lg-0">
					<img src="images/cargr0.jpg" alt="Image placeholder" class="img-fluid">
				</div>
				<div class="col-lg-5 pl-lg-5">
					<div class="section-heading">
						<h2><strong>Acerca de:</strong></h2>
						<h1>Motors Plus</h1>
					</div>
					<p class="lead">Somos una empresa comercializadora de transportes, contamos con los mejores vehiculos de toda la ciudad.</p>
					<p class="mb-5  ">En Motors Plus encontraras autos de todo tipo, como autos deportivos, pick up´s, sedanes, suv, y hasta tractocamiones. Manejamos las mejores marcas del mundo y contamos con un catalogo extraordinario.</p>
				</div>
			</div>


		</div>
	</div>


	<section class="site-section" id="section-contact">
		<div class="container">
			<div class="row">
				<div class="col-md-12 mb-5">
					<div class="section-heading text-center">
						<h2><strong>CONTACTANOS</strong></h2>
					</div>
				</div>

				<div class="col-md-7 mb-5 mb-md-0">
					<form action="" class="site-form">
						<h3 class="mb-5">Escribenos </h3>
						<div class="form-group">
							<input type="text" class="form-control px-3 py-4" placeholder="Your Name" required>
						</div>
						<div class="form-group">
							<input type="email" class="form-control px-3 py-4" placeholder="Your Email" required>
						</div>
						<div class="form-group">
							<input type="number" class="form-control px-3 py-4" placeholder="Your Phone" required>
						</div>
						<div class="form-group mb-5">
							<textarea class="form-control px-3 py-4"cols="30" rows="10" placeholder="Write a Message" required></textarea>
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-primary  px-4 py-3" value="Send Message">
						</div>
					</form>
				</div>
				<div class="col-md-5 pl-md-5">
					<h3 class="mb-5">Reportes y sugerencias</h3>
					<ul class="site-contact-details">
						<li>
							<span class="text-uppercase">correo electronico</span>
							MOTORS PLUS AGS@gmail.com
						</li>
						<li>
							<span class="text-uppercase">Facebook</span>
							MOTORS PLUS AGUASCALINTES OFICIAL
						</li>
						<li>
							<span class="text-uppercase">WhatsAPP</span>
							+52 449 999 890
						</li>
						<li>
							<span class="text-uppercase">Ubicacion</span>
							Lic. Benito Juarez 108 , <br>
							zona centro ,x <br>
							c.p 20000 Aguasclientes , Ags

							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3702.399250763287!2d-102.29868208557816!3d21.8806963635253!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8429ef5f7177ad93%3A0xee8d3c7c61099a88!2sCentro%20Aguascalientes!5e0!3m2!1ses-419!2smx!4v1659098352706!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>


						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>


	<footer class="site-footer">
		<div class="container">

			<div class="row mb-5">
				<p class="col-12 text-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					MOOS PLUS  &copy; <script>document.write(new Date().getFullYear());</script> Reservados todos los derechosReservados todos los derechos | This template is made with <i class="icon-heart text-danger" aria-hidden="true" ></i> by <a href="https://colorlib.com" target="_blank" class="text-primary">Colorlib</a>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</p>
			</div>
			
			<div class="row mb-5">
				<div class="col-md-12 text-center">
					<p>
						<a href="#" class="social-item"><span class="icon-facebook2"></span></a>
						<a href="#" class="social-item"><span class="icon-twitter"></span></a>
						<a href="#" class="social-item"><span class="icon-instagram2"></span></a>
						<a href="#" class="social-item"><span class="icon-linkedin2"></span></a>
						<a href="#" class="social-item"><span class="icon-vimeo"></span></a>
					</p>
				</div>
			</div>
			
		</div>
	</footer>



	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	<script src="js/vendor/jquery.min.js"></script>
	<script src="js/vendor/jquery-migrate-3.0.1.min.js"></script>
	<script src="js/vendor/popper.min.js"></script>
	<script src="js/vendor/bootstrap.min.js"></script>

	<script src="js/vendor/jquery.easing.1.3.js"></script>

	<script src="js/vendor/jquery.stellar.min.js"></script>
	<script src="js/vendor/jquery.waypoints.min.js"></script>

	<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
	<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
	<script src="js/custom.js"></script>

	<!-- Google Map -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    	<script src="js/google-map.js"></script> -->

    </body>
    </html>