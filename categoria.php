<!-- Conexion -->
<?php require_once 'includes/conexion.php'; ?>

<!-- Helpers -->
<?php require_once 'includes/helpers.php'; ?>
<?php
    $categoriaActual = conseguirCategoria($db, $_GET['id']);
    if (!isset($categoriaActual['id'])) {
        header('Location: index.php');
    }
?>
<!-- CABECERA -->
<?php require_once 'includes/cabecera.php'; ?>

<!-- BARRA LATERAL -->
<?php require_once 'includes/sidebar.php'; ?>


<!-- DIV PRINCIPAL -->
<div id="principal">
    <h1>Entradas de <?=$categoriaActual['nombre']?></h1>
    <?php
        $entradas = conseguirEntradas($db, null, $_GET['id']);

        if (!empty($entradas) && mysqli_num_rows($entradas) >= 1):
            while($entrada = mysqli_fetch_assoc($entradas)):
    ?>
        <article class="entrada">
            <a href="entrada.php?id=<?=$entrada['id']?>">
                <h2><?=$entrada['titulo']?></h2>
                <span class="fecha"><?=$entrada['categoria'].' | '.$entrada['fecha']?></span>
                <p>
                    <?= substr($entrada['descripcion'], 0, 200).'...'?>
                </p>
            </a>
        </article>
    <?php
            endwhile;
        else:
    ?>
    <div class="alerta-error" >No hay entradas en esta categoria</div>

    <?php
        endif;
    ?>

</div>  <!-- FIN DIV PRINCIPAL -->


<!-- PIE DE PÁGINA -->
<?php require_once 'includes/piePagina.php'; ?>