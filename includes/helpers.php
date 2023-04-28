<?php 
//Aquí van funciones que nos ayudan en las diferentes partes del proyecto

function mostrarError ($errores,$campo){
    $alerta = '';
    if(isset($errores[$campo]) && !empty($campo)){
        $alerta = "<div class='alerta-error'>".$errores[$campo]."</div>";
    }
    return $alerta;
}

function borrarErrores(){
    $borrado = false;

    if (isset($_SESSION['errores'])) {
        $_SESSION['errores'] = null;
        //$borrado = session_unset();
        $borrado = $_SESSION['errores'];
    }

    if (isset($_SESSION['completado'])) {
        $_SESSION['completado'] = null;
        //$borrado = session_unset();
        $borrado = $_SESSION['completado'];
    }

    return $borrado;
}

function borrarSesion(){
    $borrado = false;

    if (isset($_SESSION['error_login'])) {
        $_SESSION['error_login'] = null;
        //$borrado = session_unset();
        $borrado = $_SESSION['error_login'];
    }

    return $borrado;
}


function conseguirCategorias($conexion){
    $sql = "SELECT * FROM categorias ORDER BY id ASC;";
    $categorias = mysqli_query($conexion, $sql);
    $result = array();

    if ($categorias && mysqli_num_rows($categorias) >= 1) {
        $result = $categorias;
    }else {
        echo 'Hubo un problema';
    }
    return $result;
}
?>