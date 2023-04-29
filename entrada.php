<!-- Conexion -->
<?php require_once 'includes/conexion.php'; ?>

<!-- Helpers -->
<?php require_once 'includes/helpers.php'; ?>
<?php
    $entradaActual = conseguirEntrada($db, $_GET['id']);
    if (!isset($entradaActual['id'])) {
        header('Location: index.php');
    }
?>
<!-- CABECERA -->
<?php require_once 'includes/cabecera.php'; ?>

<!-- BARRA LATERAL -->
<?php require_once 'includes/sidebar.php'; ?>


<!-- DIV PRINCIPAL -->
<div id="principal">
    <h1><?=$entradaActual['titulo']?></h1>
    <a href="categoria.php?id=<?=$entradaActual['categoria_id']?>">
        <h2><?=$entradaActual['categoria']?> | <?=$entradaActual['usuario']?> </h2>
    </a>
    <h4><?=$entradaActual['fecha']?></h4>
    <p>
        <?=$entradaActual['descripcion']?>

    </p>
    <br>
    <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']['id'] == $entradaActual['usuario_id']):?>
        <a href="editarEntrada.php?id=<?=$entradaActual['id']?>" class="boton boton-naranja">Editar entrada</a>
        <a href="borrarEntrada.php?id=<?=$entradaActual['id']?>" class="boton boton-rojo">Eliminar entrada</a>
    <?php endif;?> 
</div>  <!-- FIN DIV PRINCIPAL -->


<!-- PIE DE PÁGINA -->
<?php require_once 'includes/piePagina.php'; ?>