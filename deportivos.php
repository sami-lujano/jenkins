<?php

require 'config/database.php';
require 'config/config.php';
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT id, nombre, precio ,id_categoria FROM productos WHERE activo=1 AND id_categoria=1");

$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motors Plus-Deportivos</title>
    <!-- CSS only -->
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/flexslider.css">
	<link rel="stylesheet" href="fonts/icomoon/style.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">

	<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700" rel="stylesheet">
</head>
<body>
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
                <li class="nav-item"><a href="index.php" class="nav-link">Inicio</a></li>
                
                <li class="nav-item"><a href="deportivos.php" class="nav-link  active">Deportivos</a></li>
                <li class="nav-item"><a href="trailers.php" class="nav-link">Trailers</a></li>
                <li class="nav-item"><a href="pickup.php" class="nav-link">Pick UP</a></li>
                <li class="nav-item"><a href="sedanes.php" class="nav-link">Sedanes</a></li>
                <li class="nav-item"><a href="suv.php" class="nav-link">SUV</a></li>


            </ul>

            <a href="checkout.php" class="btn btn-primary">
              Carrito <span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span>
            </a>
        </div>
    </div>
  </div>
</header> 

<section class="site-hero" style="background-image: url(images/1/3/01.jpg);" id="section-home" data-stellar-background-ratio="0.5">
		<div class="container">
			<div class="row intro-text align-items-center justify-content-center">
				<div class="col-md-10 text-center pt-5">

					<h1 class="site-heading site-animate">Dodge <strong class="d-block">Challenger</strong></h1>
					<strong class="d-block text-white text-uppercase letter-spacing">Los mejores deportivo</strong>

				</div>
			</div>
		</div>
	</section> 
    <br>
    <main>
    <div class="container">
    <div class="row row-cols-1 row-cols-md-2 g-4">
      <?php foreach($resultado as $row){ ?>
    <div class="col">
        <div class="card">
        <?php
        $id = $row['id'];
        $categoria = $row['id_categoria'];
        $image = "images/". $categoria. "/".$id."/02.jpg";

        if(!file_exists($image)){
            $image = "images/no-foto.gif";
        }


        ?>
        <img src="<?php echo $image; ?>" class="card-img-top"   alt="...">
        <div class="card-body">
        <h5 class="card-title text-black"><?php echo $row['nombre']; ?></h5>
        <p class="card-text text-black"></p>
      <p class="card-text text-black" >$ <?php echo number_format($row['precio'], 2, '.', ','); ?></p>
      <div class="btn-group">
                    <a href="detalles.php?id=<?php echo $row['id']; ?>&token=<?php echo
                    hash_hmac('sha1', $row['id'], KEY_TOKEN);?>" class="btn btn-primary">Detalles</a>

                    <a class="btn btn-secondary" type="button" onclick="addProducto(<?php echo $row['id']; ?>,
                      '<?php echo hash_hmac('sha1', $row['id'], KEY_TOKEN); ?>')">Agregar</a>
                </div>
        </div>
    </div>
    </div>
    <?php } ?>
    </div>
    </div>
</main>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<script>
  function addProducto(id, token){
    let url = 'clases/carrito.php'
    let formData = new FormData()
    formData.append('id', id)
    formData.append('token', token)

    fetch(url , {
      method: 'POST',
      body: formData,
      mode: 'cors'
    }).then(Response => Response.json())
    .then(data => {
      if(data.ok){
        let elemento= document.getElementById("num_cart")
        elemento.innerHTML = data.numero 
      }
    })
  }
</script>
</body>
</html>