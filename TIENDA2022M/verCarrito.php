<?php
include("Plantillas/encabezado.php");
    session_start();
    $subTotal = 0;
    $IVA =0;
    $aPagar =0;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito Vista</title>
</head>
<body>

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Importe</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
                <?php
                    $resultado=0;
                        foreach ($_SESSION["CARRITO"] as $valor){
                        $resultado=$resultado+$valor["importe"];
                        }
                foreach ( $_SESSION["CARRITO"] as $elemento ) {
                        //print_r($elemento);
                        echo "<br><br>";?>
                <tr>
                    <td><?php echo $elemento["id"]?></td>
                    <td><?php echo $elemento["nombre"]?></td>
                    <td><?php echo $elemento["precio"]?></td>
                    <td><input type="number" id="cantidad" onchange="actualizarCantidad(<?php echo $elemento['id']?>)" value="<?php echo $elemento["cantidad"]?>"></td>
                    <td><?php echo $elemento["importe"]?></td>
                    <td>
                
                </tr>
                <?php 
                $subTotal += $elemento["importe"];
                }
                $IVA =$subTotal * 0.12;
                $aPagar = $subTotal + $IVA;    
                ?>
        </tbody>
        <tfoot>
            <tr><th colspan="5" style="text-align:right;">Subtotal</th><th style="text-align:right;"> <?php echo $subTotal?></th></tr>
            <tr><th colspan="5" style="text-align:right;">Iva</th><th style="text-align:right;"> <?php echo $IVA?></th></th>
            <tr><th colspan="5" style="text-align:right;">Total a Pagar</th><th style="text-align:right;"> <?php echo $aPagar?></th></tr>
            <form action="pagar.php" method="POST">
            <button type="submit" class="btn btn-success" name="PAGAR" value="PAGAR">Pagar</button>
            </form>
        </tfoot>
    </table>
    <script>

    function actualizarCantidad(id,cantidad){
    //let cantidad = document.getElementById("cantidad").value;
    //--crear una constante
    const http = new XMLHttpRequest();
    const url = "carrito.php?id="+id+"&cantidad"+cantidad+"&Accion=Actualizar";
    http.open("GET",url,true);
    http.send();


    location.reload();

}

</script>
</body>
</html>