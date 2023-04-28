<!-- CONEXION -->
<?php
    require_once 'conexion.php';
    require_once 'includes/helpers.php';
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Génerico</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <!-- CABECERA -->
    <header id="cabecera">
        <!-- LOGO -->
        <div id ="logo">
            <a href="index.php">
                Lorem ipsum
            </a>
        </div>
        
    <!-- MENU -->
    <nav id="menu">
        <ul>
            <li>
                <a href="index.php">INICIO</a>
            </li>
            <?php 
                $categorias = conseguirCategorias($db);
               while($categoria = mysqli_fetch_assoc($categorias)) :
            ?>
                <li>
                    <a href="categoria.php?id=<?= $categoria['id']?>"><?= $categoria['nombre']?></a>
                </li>
            <?php  endwhile;?>
            <li>
                <a href="index.php">SOBRE MÍ</a>
            </li>
            <li>
                <a href="index.php">CONTACTO</a>
            </li>
        </ul>
    </nav>

    <div class="clearfix"></div>
    </header>
    
    <div id="contenedor">