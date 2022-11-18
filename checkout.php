<?php
require 'config/database.php';
require 'config/config.php';
$db = new Database();
$con = $db->conectar();

$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;


$lista_carrito = array();

if($productos != null){
    foreach($productos as $clave => $cantidad){

        $sql = $con->prepare("SELECT id, nombre, precio, descuento, $cantidad AS cantidad FROM productos WHERE id= ? AND activo=1");
        $sql->execute([$clave]);
        $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motors Plus-Mi carrito</title>
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
<main>
    <div class="container">
        <div class="table-responsive">
            <table class="table text-white">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($lista_carrito == null){
                        echo '<tr> <td colspan="5" class="text-center><b> Lista vacia</b></td></tr>';
                    }else{
                        $total = 0;
                        foreach ($lista_carrito as $productos){
                            $_id = $productos['id'];
                            $nombre = $productos['nombre'];
                            $precio = $productos['precio'];
                            $descuento = $productos['descuento'];
                            $cantidad = $productos['cantidad'];
                            $precio_des = $precio - (($precio * $descuento) / 100);
                            $subtotal = $cantidad * $precio_des;
                            $total = $total + $subtotal;
                    ?>

                    <tr>
                        <td><?php echo $nombre; ?></td>
                        <td>$<?php echo number_format($precio_des, 2, '.', ','); ?></td>
                        <td>
                            <input type="number" min = "1" max="5" step="1" value="<?php echo $cantidad ?>" size="5" id="cantida_<?php echo $_id; ?>" onchange="actualizarCantidad(this.value, <?php echo $_id; ?>)">
                        </td>
                        <td>
                            <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]">
                            <?php echo number_format($subtotal, 2, '.', ','); ?>
                          </div>
                        </td>
                        <td><a href="#" id="elimina" class="btn btn-danger btn-sm" data-bs-id="<?php echo $_id; ?>" data-bs-toggle="modal" data-bs-target="#eliminaModal">Eliminar</a></td>
                    </tr>
                    <?php } ?>

                    <tr>
                        <td colspan="3"></td>
                        <td colspan="2">
                            <p class="h3" id="total">$<?php echo number_format($total, 2, '.', ',');?></p>
                        </td>
                    </tr>
                </tbody>
                <?php }?>
              
            </table>
        </div>
        <div class="row">
            <div class="col-md-5 offset-md-7 d-grid gap-2">
                <a href="no-disponible.html" class="btn btn-primary btn-lg">Realizar pago</a>
            </div>
        </div>
    </div>
</main>

<!-- Modal -->
  <div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-black" id="eliminaModalLabel">¡Cuidad!</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-black">
          ¿Seguro que desea eliminar el vehiculo?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button id="btn-elimina" type="button" class="btn btn-outline-danger" onclick="eliminar()"> Eliminar </button>
        </div>
      </div>
    </div>
  </div>


<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<script>

let eliminaModal = document.getElementById('eliminaModal');
    eliminaModal.addEventListener('show.bs.modal', function(event){
        let button = event.relatedTarget;
        let id = button.getAttribute('data-bs-id');
        let buttonElimina = eliminaModal.querySelector('.modal-footer #btn-elimina');
        buttonElimina.value = id;
    })

  function actualizarCantidad(cantidad, id){
    let url = 'clases/actualizar_carrito.php'
    let formData = new FormData()
    formData.append('action', 'agregar')
    formData.append('id', id)
    formData.append('cantidad', cantidad)

    fetch(url, {
          method: 'POST',
          body: formData,
          mode: 'cors'
        }).then(response => response.json())
        .then(data => {
          if(data.ok){

              let divsubtotal = document.getElementById('subtotal_' + id);
              divsubtotal.innerHTML = data.sub;

              let total = 0.00
              let list = document.getElementsByName('subtotal[]')


              for(let i = 0; i < list.length; i++){
                total = total + parseFloat(list[i].innerHTML.replace(/[$,]/g, ''));
              }
              total = new Intl.NumberFormat('en-US', {
                minimumFractionDigits: 2 
              }).format(total)
              document.getElementById('total').innerHTML = '<?php echo "$" ?>' + total 
          }
        })
    }

    function eliminar()
    {
        let botonElimina = document.getElementById ('btn-elimina');
        let id = botonElimina.value;

        let url = 'clases/actualizar_carrito.php';
        let formData = new FormData();
        formData.append('action', 'eliminar');
        formData.append('id', id);
 
        fetch(url, {
          method: 'POST',
          body: formData,
          mode: 'cors'
        }).then(response => response.json())
        .then(data => {
          if(data.ok)
          {
              location.reload();
          }
        })
    }
</script>
</body>
</html>