<?php require_once 'includes/redireccion.php'; ?>

<!-- CABECERA -->
<?php require_once 'includes/cabecera.php'; ?>

<!-- BARRA LATERAL -->
<?php require_once 'includes/sidebar.php'; ?>

<!-- DIV PRINCIPAL -->
<div id="principal">
    <h1>Crear entradas</h1>
    <form action="guardarEntrada.php" method="POST">
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo">
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : '';?>

        <label for="descripcion">Descripción:</label>
        <textarea type="text" name="descripcion"></textarea>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : '';?>

        <label for="categoria">Categoría:</label>
        <select name="categoria">
            <?php
                $categorias = conseguirCategorias($db);
                if (!empty($categorias)) :
                while ($categoria = mysqli_fetch_assoc($categorias)):
            ?>
                <option value="<?= $categoria['id']?>">
                    <?=$categoria['nombre']?>
                </option>
            <?php
                    endwhile;
                endif;
            ?>
            <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria') : '';?>


        </select>

        <input type="submit" value="Enviar">


    </form>
    <?php borrarErrores(); ?>
</div>  <!-- FIN DIV PRINCIPAL -->


<!-- PIE DE PÁGINA -->
<?php require_once 'includes/piePagina.php'; ?>






