<?php 
    if (isset($_POST)) {

        //Conexión con la base de datos
        require_once 'includes/conexion.php';

        //Inicio de sesión
        $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($db,$_POST['titulo']) : false;
        $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db,$_POST['descripcion']) : false;
        $categoria  = isset($_POST['categoria']) ? (int)$_POST['categoria'] : false;
        $usuario = $_SESSION['usuario']['id'];


        //Array de errores
        $errores = array();
        
        //Validar datos antes de guardar en la base de datos
        //Validar campo nombre
        if (empty($titulo)) {
            $errores['titulo'] = 'El titulo no es válido';
        }
        if (empty($descripcion)) {
            $errores['descripcion'] = 'La descripción no es valida';
        }
        if (empty($categoria) && !is_numeric($categoria)) {
            $errores['categoria'] = 'La categoria no es válida';
        }

        if (count($errores) == 0) {
            $sql = "INSERT INTO entradas VALUES(null, $usuario, $categoria, '$titulo', '$descripcion', CURDATE());";
            $guardar = mysqli_query($db, $sql);
            //var_dump(mysqli_error($db));
            //die();
            header("Location: index.php");
        }else{
            $_SESSION['errores_entrada'] = $errores;
            header("Location: crearEntrada.php");
        }

    }
    //Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem iusto amet expedita modi pariatur dolorem cum, sit voluptate perferendis error aliquam quaerat assumenda. Nostrum impedit dolor consequuntur repellendus nesciunt commodi.
?>