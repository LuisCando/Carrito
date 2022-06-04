<?php
    include "Admin/BDD/conexion.php";

    session_start();

    $verificar = true;

//Verifica que la solicitud sea POST y que la solicitud tenga el nombre de Agregar
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Agregar'])){
    
    $id = $_POST['id_productos']; //Nombre del input del form index
    
    $sql = "select * from productos where id_productos = $id and stock > 3 "; 

    $result = $conn->query($sql);
    //Extraer lo que haya venido en el result
    $row = $result->fetch_assoc();
    //Iniciar secion
    if(!isset($_SESSION["CARRITO"])){
        $tempCarrito = array(
            "id"=>$row["id_productos"],      //1->Formulario -- 2->Base de Datos
            "nombre"=>$row["nombre"],
            "precio"=>$row["precio"],
            "cantidad"=>1,
            "importe"=>$row["precio"],
        );
        $_SESSION["CARRITO"][$row["id_productos"]] = $tempCarrito;
    }else{
        foreach($_SESSION["CARRITO"] as $elemento){
            if($elemento["id"] == $id){
                $_SESSION["CARRITO"][$id]["cantidad"]++;
                $_SESSION["CARRITO"][$id]["importe"] = $_SESSION["CARRITO"][$id]["cantidad"] * $_SESSION["CARRITO"][$id]["precio"];
                $verificar = false;
            }
        }
        if($verificar){
            //Sacar el total de elementos de carrito
            $totalElementos = count($_SESSION["CARRITO"]);
            $tempCarrito = array(
                "id"=>$row["id_productos"],      //1->Formulario -- 2->Base de Datos
                "nombre"=>$row["nombre"],
                "precio"=>$row["precio"],
                "cantidad"=>1,
                "importe"=>$row["precio"],
            );
            $_SESSION["CARRITO"][$row["id_productos"]] = $tempCarrito;
        }
    }
    header("Location: verCarrito.php");

    }else if($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST["Eliminar"])){
        
        $id =$_POST["id"];
        unset($_SESSION["CARRITO"][$id]);
        header("Location: verCarrito.php");
        
    }else if ($_SERVER["REQUEST_METHOD"]=="GET" && isset($_GET["Accion"])) {
                $id = $_GET['cantidad'];
                $_SESSION["CARRITO"][$id]["cantidad"] = $cantidad;
                $_SESSION["CARRITO"][$id]["importe"] = $_SESSION["CARRITO"][$id]["cantidad"] * $_SESSION["CARRITO"][$id]["precio"] ;
            }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
</head>
<body>
    <br>
    <a href="index.php">Regresar</a>
    
</body>
</html>