<?php 
//Ayuda de funciones
require_once 'includes/helpers.php';

//Iniciar la sesion y la conexión a BD
require_once 'includes/conexion.php';


if (isset($_POST)) {
    //Borrar errores antiguo
    borrarSesion();

    //Recoger datos del formulario
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
}

//Consulta para comprobar las credenciales del usuario
$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$login = mysqli_query($db, $sql);

if ($login && mysqli_num_rows($login) == 1){
    $usuario = mysqli_fetch_assoc($login);
    /*var_dump($usuario);
    die();*/

    //Comprobar la contraseña cifrada
    $verify = password_verify($password, $usuario['password']);

    if ($verify) {
        //Utilizar una sesión para guardar los datos del usuario logueado
        $_SESSION['usuario'] = $usuario;

        
        //var_dump($_POST);
        //die();
    } else {
        //Si algo falla, enviar una sesión con el fallo
        $_SESSION['error_login'] = 'Login incorrecto!';
    }


} else {
    //Mensaje de error
    $_SESSION['error_login'] = 'Login incorrecto!';
}


//Redirigir al index.php
header('Location: index.php');















?>

