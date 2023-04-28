<?php 
    if (isset($_POST)) {

        //Conexión con la base de datos
        require_once 'includes/conexion.php';

        //Inicio de sesión
        $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db,$_POST['nombre']) : false;

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

        if (count($errores) == 0) {
            $sql = "INSERT INTO categorias VALUES(null, UPPER('$nombre'));";
            $guardar = mysqli_query($db, $sql);
        }
    
    }

    header("Location: index.php");

?>