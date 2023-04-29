<?php require_once 'includes/redireccion.php'; ?>

<!-- CABECERA -->
<?php require_once 'includes/cabecera.php'; ?>

<!-- BARRA LATERAL -->
<?php require_once 'includes/sidebar.php'; ?>

<!-- DIV PRINCIPAL -->
<div id="principal">
            <h3>Mis datos</h3>

            <!-- MOSTRAR ERRORES -->
            <?php if (isset($_SESSION['completado'])):?>
                <div class="alerta">
                    <?= $_SESSION['completado']?>
                </div>
            <?php elseif(isset($_SESSION['errores']['general'])):?>
                <div class="alerta-error">
                    <?= $_SESSION['errores']['general']?>
                </div>
            <?php endif; ?>




            <form action="actualizarUsuario.php" method="POST">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" value ="<?=$_SESSION['usuario']['nombre']?>">
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : '';?>

                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos" value ="<?=$_SESSION['usuario']['apellidos']?>">
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : '';?>

                <label for="email">Email</label>
                <input type="email" name="email" value ="<?=$_SESSION['usuario']['email']?>">
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : '';?>

                <input type="submit" name="submit" value="Actualizar">
            </form>
            <?php borrarErrores() ?>

</div>  <!-- FIN DIV PRINCIPAL -->


<!-- PIE DE PÁGINA -->
<?php require_once 'includes/piePagina.php'; ?>