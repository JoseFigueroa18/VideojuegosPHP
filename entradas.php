
<!-- CABECERA -->
<?php require_once 'includes/cabecera.php'; ?>

<!-- BARRA LATERAL -->
<?php require_once 'includes/sidebar.php'; ?>


<!-- DIV PRINCIPAL -->
<div id="principal">
    <h1>Todas las entradas</h1>
    <?php
        $entradas = conseguirEntradas($db, null);
        //var_dump($entradas);
        if (!empty($entradas)):
            while($entrada = mysqli_fetch_assoc($entradas)):
    ?>
        <article class="entrada">
            <a href="">
                <h2><?=$entrada['titulo']?></h2>
                <span class="fecha"><?=$entrada['categoria'].' | '.$entrada['fecha']?></span>
                <p>
                    <?= substr($entrada['descripcion'], 0, 200).'...'?>
                </p>
            </a>
        </article>
    <?php
            endwhile;
        endif;
    ?>

    <div id="ver-todas">
        <a href="index.php">Ver ultimas entradas</a>
    </div>
</div>  <!-- FIN DIV PRINCIPAL -->


<!-- PIE DE PÁGINA -->
<?php require_once 'includes/piePagina.php'; ?>