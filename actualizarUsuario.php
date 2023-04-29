<?php 
 if (isset($_POST)) {

    //Conexión con la base de datos
    require_once 'includes/conexion.php';

    //Inicio de sesión
    /*if (!isset($_SESSION)) {
        session_start();
    }*/

    //Recoger los valores del formulario de actualizacion y evaluar si existen mediante un operador ternario
    //esto para evitar hacer muchos if (isset($_POST[''])){} else {}
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false ;
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false ;
    $email = isset($_POST['email']) ? trim($_POST['email']) : false ;


    //Array de errores
    $errores = array();
    
    //Validar datos antes de guardar en la base de datos
    //Validar campo nombre
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
        $nombre_validado = true;
    }
    else{
        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es válido";
    }
    
    //Validar campo apellidos
    if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)) {
        $apellidos_validado = true;
    }
    else{
        $apellidos_validado = false;
        $errores['apellidos'] = "Los apellidos no son válidos";
    }

    //Validar campo email
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_validado = true;
    }
    else{
        $email_validado = false;
        $errores['email'] = "El email no es válido";
    }

    $guardarUsuario = false;
    //Validar que no se encuentren errores
    if (count($errores) == 0) {
        $usuario = $_SESSION['usuario'];
        $usuarioID = $usuario['id'];
        $guardarUsuario = true;

        //comprobar si email existe
        $sql = "SELECT email FROM usuarios WHERE email = '$email'";
        $isset_email = mysqli_query($db,$sql);
        $isset_user = mysqli_fetch_assoc($isset_email);
    
        if ($isset_user['id'] == $usuario['id'] || empty($isset_user)) {
            //Actualizar en BD
            $sql = "UPDATE usuarios SET nombre = '$nombre', apellidos= '$apellidos', email = '$email' WHERE id = '$usuarioID';";
            $guardar = mysqli_query($db, $sql);

            //var_dump(mysqli_error($db));
            //die();
    
            if ($guardar) {

                $_SESSION['usuario']['nombre'] = $nombre;
                $_SESSION['usuario']['apellidos'] = $apellidos;
                $_SESSION['usuario']['email'] = $email;
                $_SESSION['completado'] = "Tus datos se han actualizado con exito";

            }
            else{
                $_SESSION['errores']['general'] = "No se ha podido actualizar";
            }
        }else {
            $_SESSION['errores']['general'] = "El usuario ya existe!";

        }


    }
    else{
        $_SESSION['errores'] = $errores;
    }
 }
 header('Location: misDatos.php');
?>