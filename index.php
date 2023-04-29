
<!-- CABECERA -->
<?php require_once 'includes/cabecera.php'; ?>

<!-- BARRA LATERAL -->
<?php require_once 'includes/sidebar.php'; ?>


<!-- DIV PRINCIPAL -->
<div id="principal">
    <h1>Ultimas entradas</h1>
    <?php
        $entradas = conseguirEntradas($db, TRUE, null);
        //var_dump($entradas);
        if (!empty($entradas)):
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
        endif;
    ?>

    <div id="ver-todas">
        <a href="entradas.php">Ver todas las entradas</a>
    </div>
</div>  <!-- FIN DIV PRINCIPAL -->


<!-- PIE DE PÁGINA -->
<?php require_once 'includes/piePagina.php'; ?>