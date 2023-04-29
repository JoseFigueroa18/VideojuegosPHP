<?php require_once 'includes/redireccion.php'; ?>

<!-- CABECERA -->
<?php require_once 'includes/cabecera.php'; ?>

<!-- BARRA LATERAL -->
<?php require_once 'includes/sidebar.php'; ?>

<!-- DIV PRINCIPAL -->
<div id="principal">
    <h1>Crear categorias</h1>
    <form action="guardarCategoria.php" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre">

        <input type="submit" value="Enviar">

    </form>
</div>  <!-- FIN DIV PRINCIPAL -->


<!-- PIE DE PÁGINA -->
<?php require_once 'includes/piePagina.php'; ?>