<?php 
//Aquí van funciones que nos ayudan en las diferentes partes del proyecto

//Alertas de mostrar errores
function mostrarError ($errores,$campo){
    $alerta = '';
    if(isset($errores[$campo]) && !empty($campo)){
        $alerta = "<div class='alerta-error'>".$errores[$campo]."</div>";
    }
    return $alerta;
}

//Borrar errores de la sesión de registro
function borrarErrores(){
    $borrado = false;

    if (isset($_SESSION['errores'])) {
        $_SESSION['errores'] = null;
        //$borrado = session_unset();
        $borrado = true;
    }

    if (isset($_SESSION['completado'])) {
        $_SESSION['completado'] = null;
        //$borrado = session_unset();
        $borrado = true;
    }

    if (isset($_SESSION['errores_entrada'])) {
        $_SESSION['errores_entrada'] = null;
        $borrado = true;
    }

    return $borrado;
}

//Borrar sesión del LOGIN
function borrarSesion(){
    $borrado = false;

    if (isset($_SESSION['error_login'])) {
        $_SESSION['error_login'] = null;
        //$borrado = session_unset();
        $borrado = $_SESSION['error_login'];
    }

    return $borrado;
}

//Mostrar categorias en la barra lateral | Sidebar
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

//Mostrar categorias en la barra lateral | Sidebar
function conseguirCategoria($conexion, $id){
    $sql = "SELECT * FROM categorias WHERE id = '$id';";
    $categorias = mysqli_query($conexion, $sql);
    $result = array();

    if ($categorias && mysqli_num_rows($categorias) >= 1) {
        $result = mysqli_fetch_assoc($categorias);
    }else {
        echo 'Hubo un problema';
    }
    return $result;
}

//Mostrar categorias en la barra lateral | Sidebar
function conseguirEntrada($conexion, $id){
    $sql = "SELECT e.*, c.nombre as 'categoria', CONCAT(u.nombre,' ',u.apellidos) as 'usuario'FROM entradas e INNER JOIN categorias c ON e.categoria_id = c.id INNER JOIN usuarios u ON e.usuario_id = u.id WHERE e.id = '$id';";
    $entrada = mysqli_query($conexion, $sql);
    $result = array();

    if ($entrada && mysqli_num_rows($entrada) >= 1) {
        $result = mysqli_fetch_assoc($entrada);
    }else {
        echo 'Hubo un problema';
    }
    return $result;
}

//Mostrar entradas
function conseguirEntradas($conexion, $limit = null, $categoria = null){
    $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e INNER JOIN categorias c ON e.categoria_id = c.id ";
    
    if(!empty($categoria)){
        $sql .= "WHERE e.categoria_id = '$categoria'";
    }
    
    $sql .= "ORDER BY e.id DESC "; 

    if($limit){
        $sql .= "LIMIT 4";
    }

    $entradas = mysqli_query($conexion, $sql);
    $result = array();

    if ($entradas && mysqli_num_rows($entradas) >= 1) {
        $result = $entradas;
    }else {
        //echo 'Hubo un problema';
    }
    return $result;
}


?>