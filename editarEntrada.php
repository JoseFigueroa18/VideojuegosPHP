<?php require_once 'includes/redireccion.php'; ?>

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
    <h1>Editar Entradas</h1>
    <p>
        Edita la entrada <?=$entradaActual['titulo']?>
    </p>
    <br>
    <form action="guardarEntrada.php?editar=<?=$entradaActual['id']?>" method="POST">
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" value="<?=$entradaActual['titulo']?>">
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : '';?>

        <label for="descripcion">Descripción:</label>
        <textarea type="text" name="descripcion"><?=$entradaActual['descripcion']?></textarea>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : '';?>
        <br>
        <label for="categoria">Categoría:</label>
        <select name="categoria">
            <?php
                $categorias = conseguirCategorias($db);
                if (!empty($categorias)) :
                while ($categoria = mysqli_fetch_assoc($categorias)):
            ?>
                <option value="<?= $categoria['id']?>"<?=($categoria['id'] == $entradaActual['categoria_id']) ? 'selected="selected"' : ''?>>
                    <?=$categoria['nombre']?>
                </option>
            <?php
                    endwhile;
                endif;
            ?>
            <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria') : '';?>


        </select>
        <br>
        <br>

        <input type="submit" value="Actualizar">


    </form>
    <?php borrarErrores(); ?>
</div>  <!-- FIN DIV PRINCIPAL -->







<!-- PIE DE PÁGINA -->
<?php require_once 'includes/piePagina.php'; ?>