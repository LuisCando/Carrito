<?php
    include "Plantillas/encabezado.php";
    include "Admin/BDD/conexion.php";

    session_start();
    $verificar=true;

  
    if($_SERVER["REQUEST_METHOD"] == "POST" || isset($_POST['PAGAR'])){

      $user = $_POST['usr'];
      $pass = $_POST['pwd'];
        
        $sql = "select * from clientes where usr = '$user' and pwd = '$pass';";

        $res = $conn->query($sql);

        if($res->num_rows == 1){
            $row = $res->fetch_assoc();
            $id= $row["id_clientes"];
            $subTotal = 0;
            $IVA= 0;
            $aPagar = 0;
            
            foreach($_SESSION["CARRITO"] as $elemento){
                $subTotal += $elemento["importe"];
            }

            $IVA = $subTotal * 0.12;
            $aPagar = $subTotal + $IVA; 
            
            $sql = "insert into facturas values (null,CURDATE(),$subTotal,$IVA,$aPagar,$id);";
            $idFac=0;

            if(!$conn->query($sql)){
              $verificar = false;
            }else{
              $idFac = $conn->insert_id; 
            }

            //investigar el detalle de los productos.
              foreach($_SESSION["CARRITO"] as $elemento){
              $idp = $elemento['id'];
              $cantidad = $elemento['cantidad'];
              $precio = $elemento['precio'];
              $importe = $elemento['importe'];

              $sql = "insert into detalles values (null,$cantidad,$precio,$importe,$idFac,$idp);";
              if(!$conn->query($sql)){
                $verificar = false;
              }
            }

           $conn->close();

            if($verificar){
               //session_destroy();
                echo "<script> 
                        alert ('Bienvenido, compra realizada')
                        window.location.href = 'factura.php?id_clientes=$id&facturas=$idFac';
                    </script>";
                }else{
                    echo "<script>
                        alert ('Error al comprar')
                        window.location.href = 'index.php';
                    </script>";
                    echo $sql;
                }
        }else{
                echo "<script> alert ('Error usuario no encontrado')</script>";
        }

    }




?>
<div class="container">
  <div class="row">
<form method="POST">
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Email:</label>
    <input type="text" class="form-control" id="usr" name="usr" placeholder="Enter email">
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Password:</label>
    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
</div>