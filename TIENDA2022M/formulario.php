
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.js"></script>
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark" style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="#">ISTVN</a> 
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link">Maryuri Chisaguano</a>
                </li>
            </ul>
    </nav>
<div class="container">
        <div class="row">
            <div class="col-md-12"><br>
                <div class="card">
                    <div class="card-header">
                       Formulario de Productos
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="Admin/BDD/Crud.php">
                        <input type="hidden" name="id_productos" value="<?php echo $id ?>">
                        <div class = "form-group">
                            <label for="nombre">Ingrese nombre del producto</label>
                            <input type="text" class="form-control" id="nombre" name="nombre">
                        </div>
                        <br>
                        <div class = "form-group">
                            <label for="detalle">Ingrese detalle</label>
                            <input type="text" class="form-control" id="detalle" name="detalle">
                        </div>
                        <br>
                        <div class = "form-group">
                            <label for="precio">Ingrese precio</label>
                            <input type="text" class="form-control" id="precio" name="precio">
                        </div>
                        <br>
                        <div class = "form-group">
                            <label for="stock">Ingrese stock</label>
                            <input type="text" class="form-control" id="stock" name="stock" >
                        </div>
                        <br>
                        <div class = "form-group">
                            <label for="id_categorias">Ingrese categoria</label>
                            <input type="text" class="form-control" id="id_categorias" name="id_categorias">
                        </div>
                        <br>
                        <div class = "form-group">

                        <button type="submit" class="btn btn-success" name="Enviar" value="Guardar">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include ("plantillas/pie.php");
?>