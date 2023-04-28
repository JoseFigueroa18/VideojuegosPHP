<?php 
 if (isset($_POST)) {

    //Conexión con la base de datos
    require_once 'includes/conexion.php';

    //Inicio de sesión
    if (!isset($_SESSION)) {
        session_start();
    }

    //Recoger los valores del formulario y evaluar si existen mediante un operador ternario
    //esto para evitar hacer muchos if (isset($_POST[''])){} else {}
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false ;
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false ;
    $email = isset($_POST['email']) ? trim($_POST['email']) : false ;
    $password = isset($_POST['password']) ? $_POST['password'] : false ; 

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

    //Validar campo password
    if (!empty($password)) {
        $password_validado = true;
    }
    else{
        $password_validado = false;
        $errores['password'] = "La contraseña está vacia";
    }
    //var_dump($errores);

    $guardarUsuario = false;
    //Validar que no se encuentren errores
    if (count($errores) == 0) {
        $guardarUsuario = true;
        //Ciframos la contraseña porque guardar en texto plano es ilegal según Betanco
        $passwordSegura = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]); //cost es la cantidad de veces que se cifrará
        /*var_dump($password);
        var_dump($passwordSegura);
        var_dump(password_verify($password,$passwordSegura));
        die();*/

        //Insertar en BD
        $sql = "INSERT INTO usuarios VALUES (null, '$nombre', '$apellidos', '$email', '$passwordSegura', CURDATE());";
        $guardar = mysqli_query($db, $sql);
        //var_dump(mysqli_error($db));
        //die();

        if ($guardar) {
            $_SESSION['completado'] = "El registro se ha completado con exito";

        }
        else{
            $_SESSION['errores']['general'] = "El registro no se ha guardado";
        }

    }
    else{
        $_SESSION['errores'] = $errores;
    }
 }
 header('Location: index.php');
?>