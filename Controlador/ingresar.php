<?php
    require 'conexion.php';

    
    $usuario=$_POST['usuario'];
    $password=$_POST['clave'];
    
    $sql = "SELECT * from usuarios where username='$usuario'";
    $result = $conexion->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if($row["password"]== $password){
                echo '
                    <script>
                        alert("Binevenido");
                        location.href="http://localhost/Motors_Plus/index.php"
                    </script>';
            }
            else{
                echo '
                <script>
                   alert("CONTRASEÑA INCORRECTA");
                   location.href="http://localhost/Motors_Plus/Login.php?#"
                </script>
                ';	
            }		
        }
    }
    else{
        echo '
        <script>
           alert("USUARIO INCORRECTO/INEXISTENTE");
           location.href="http://localhost/Motors_Plus/Login.php?#"
        </script>
        ';
    }	
    //echo "Conexion E X I T O S A";
    mysqli_close($con);
    
?>