<?php
include ("conexion.php");  
$ruta = "../../img/productos/"; 

if (isset($_POST['Enviar']) and $_POST["Enviar"] === "Guardar") {
    $id = $_POST['id_productos'];
    $nombre = $_POST['nombre'];
    $detalle = $_POST['detalle'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $id_categorias = $_POST['id_categorias'];
    
    $nombreArchivo =$_FILES["foto"]["name"]; 
    
    if (!empty($_FILES["foto"]["name"])) {
 
    $nombreArchivo =$_FILES["foto"]["name"]; 

    $ruta = $ruta.basename($_FILES["foto"]["name"]);
    if (!(move_uploaded_file($_FILES["foto"]["tmp_name"],$ruta))) {
        echo "Error al cargar archivo";
        return false;
        }
    }
    //print_r($_POST);

    if(empty($id)){
        $sql = "insert into productos (nombre,detalle,precio,stock,id_categoria,foto)
            values('$nombre','$detalle','$precio','$stock','$id_categorias','$nombreArchivo')"; 
    }else if(!empty($id)){

        if(empty($nombreArchivo)){  //Si el nombre del archivo esta vacio
            $sql = "update productos set nombre='$nombre', detalle='$detalle', precio='$precio',stock='$stock',
            id_categorias='$id_categorias' where id_productos = $id ;";

        }else if(!empty($nombreArchivo)){   //Si el nombre del archivo esta escrito
            $sql = "update productos set nombre='$nombre', detalle='$detalle', precio='$precio',stock='$stock',
                id_categorias='$id_categorias', foto='$nombreArchivo' where id_productos = $id ;";
                echo $sql;
        }
    }

        
    //$result = $conn->query($sql);
    if ($conn -> query($sql)) {
        echo "<script>
        alert ('datos ingresados correctamente');   

        </script>";
    }else{
        echo $sql;
        echo "<script>
        alert ('error al guardar'); 

        </script>";
    }

    //comprobacion si ingresa a la base
    //echo($sql);
    //var_dump($result);
    //print_r($result);


    $conn->close();
    
}else if(isset($_POST['Enviar']) and $_POST['Enviar'] === "Eliminar"){
    $id = $_POST['id_productos'];
    $sql = "delete from productos where id_productos = $id; ";
    if ($conn->query($sql)) {
        echo "eliminado correctamente";
    }else{
        echo "erro al eliminar";
    }

}


?>