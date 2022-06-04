<?php
include ("plantillas/encabezado.php");
include ("Admin/BDD/conexion.php");

    $sql = "select * from productos;";
    $result = $conn->query($sql);   

?>
<div class="container">
    <div class="row">
        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>id</th>
                    <th>nombre</th>
                    <th>detalle</th>
                    <th>precio</th>
                    <th>stock</th>
                    <th>foto</th>
                    <th>Categoria</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                    while ($row = $result->fetch_assoc()){
                ?>
                    <tr>
                        <td><?php echo $row["id_productos"];?></td>
                        <td><?php echo $row["nombre"];?></td>
                        <td><?php echo $row["detalle"];?></td>
                        <td><?php echo $row["precio"];?></td>
                        <td><?php echo $row["stock"];?></td>
                        <td><?php echo $row["foto"];?></td>
                        <td><?php echo $row["id_categorias"];?></td>
                        <td>
                            <form action= "BDD/Crud.php" method="POST">
                                <input type="hidden" name="id_productos" value="<?php echo $row["id_productos"]; ?>">
                                <button type="submit" class="btn btn-danger" name="Enviar" value="Eliminar">Eliminar</button>
                            </form>
                        </td>
                        <td>
                            <form action= "formulario.php" method="POST">
                                <input type="hidden" name="id_productos" value="<?php echo $row["id_productos"]; ?>">
                                <button type="submit" class="btn btn-success" name="Enviar" value="Actualizar">Actualizar</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                <?php
                    }
                    $conn->close();
                ?>
        </table>
    </div>
</div>

<?php   
include ("plantillas/pie.php");
?>