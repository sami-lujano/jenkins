<?php

require 'config/database.php';
require 'config/config.php';
$db = new Database();
$con = $db->conectar();

$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if($id == '' || $token == ''){
  echo 'Error al procesar la petecion';
  exit;
}else{

  $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

  if($token == $token_tmp){

    $sql = $con->prepare("SELECT count(id) FROM productos WHERE id=? AND activo=1");
    $sql->execute([$id]);
    if ($sql->fetchColumn() > 0) {
      $sql = $con->prepare("SELECT id, nombre, descripción, precio, id_categoria, descuento FROM productos WHERE id=? AND activo=1 LIMIT 1");
    $sql->execute([$id]);
    $row = $sql-> fetch(PDO::FETCH_ASSOC);
    $id = $row['id'];
    $precio = $row['precio'];
    $nombre = $row['nombre'];
    $descripcion = $row['descripción'];
    $descuento = $row['descuento'];
    $categoria = $row['id_categoria'];
    $precio_desc = $precio - (($precio * $descuento) / 100);
    $dir_images = 'images/'. $categoria .'/'. $id.'/';

    $RutImgPrin = $dir_images . '01.jpg'; 


    if(!file_exists($RutImgPrin)){
      $RutImgPrin = 'images/no-foto.gif';
    }
    
    $imagenes = array();
    if(file_exists($dir_images)){
    $dir = dir($dir_images);

    while(($archivo= $dir->read()) != false){
      if($archivo != '01.jpg' && (strpos($archivo, 'jpg') || strpos($archivo, 'jpeg'))){
        $imagenes[] = $dir_images . $archivo;
      }
    }
    $dir->close();
  }
  }
    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);


    
  }else {
    echo 'Error al procesar la petecion';
    exit;
  }


}




?>
<!DOCTYPE html>
<html lang="es">
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
  <link rel="stylesheet" href="css2/galeria.css">
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
                
                <li class="nav-item"><a href="deportivos.php" class="nav-link">Deportivos</a></li>
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
    <br>
    <main>
    <div class="container">
      <div class="row">
      <div class="col-md-6 order-mb-1">
<div id="carouselImages" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo $RutImgPrin; ?>" alt="" class="d-block w-100">
    </div>

    
      <?php foreach($imagenes as $img) {?>
        <div class="carousel-item">
          <img src="<?php echo $img; ?>" alt="" class="d-block w-100">
        </div>
        <?php } ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselImages" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselImages" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
        
      </div>
        <div class="col-md-6 order-mb-2">
          <h2><?php echo $nombre; ?></h2>

          <?php if($descuento >0) { ?>
            <p><del>$ <?php echo number_format($precio, 2, '.',','); ?></del></p>
            <h2> 
            <small class="text-success"><?php echo $descuento; ?>% descuento</small><br>
              $<?php echo number_format($precio_desc, 2, '.',','); ?>
              
            </h2>
            <?php } else { ?>
          <h2>$ <?php echo number_format($precio, 2, '.',','); ?></h2>
          <?php } ?>
          <p class="lead">
            <?php echo $descripcion; ?>
          </p>
          <div class="d-grid gap-3 col-10 max-auto">
            <a href="no-disponible.html" class="btn btn-primary">Comprar ahora</a>
            <button class="btn btn-secondary" type="button" onclick="addProducto(<?php echo $id; ?>,
            '<?php echo $token_tmp; ?>')">Agregar al carrito</button>
          </div>
          </div>
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