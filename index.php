<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog de Videojuegos</title>
    <link rel="stylesheet" href="./assets/css/style.css">k
</head>
<body>
    <!-- CABECERA -->
    <header id="cabecera">
        <!-- LOGO -->
        <div id ="logo">
            <a href="index.php">
                Lorem ipsum
            </a>
        </div>
        
    <!-- MENU -->
    <nav id="menu">
        <ul>
            <li>
                <a href="index.php">Inicio</a>
            </li>
            <li>
                <a href="index.php">Categorias 1</a>
            </li>
            <li>
                <a href="index.php">Categorias 2</a>
            </li>
            <li>
                <a href="index.php">Categorias 3</a>
            </li>
            <li>
                <a href="index.php">Categorias 4</a>
            </li>
            <li>
                <a href="index.php">Sobre mi</a>
            </li>
            <li>
                <a href="index.php">Contacto</a>
            </li>
        </ul>
    </nav>

    <div class="clearfix"></div>
    </header>

    <div id="contenedor">
        <!-- BARRA DE NAVEGACIÓN -->
        <aside id="sidebar">
            <div id="login" class="bloque">
                <h3>Identificate</h3>
                <form action="login.php" method="POST">
                    <label for="email">Email</label>
                    <input type="email" name="email">

                    <label for="password">Contraseña</label>
                    <input type="password" name="password">

                    <input type="submit" value="Ingresar">
                </form>
            </div>

            <div id="register" class="bloque">
                <h3>Identificate</h3>
                <form action="registro.php" method="POST">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre">

                    <label for="apellidos">Apellidos</label>
                    <input type="text" name="apellidos">

                    <label for="email">Email</label>
                    <input type="email" name="email">

                    <label for="password">Contraseña</label>
                    <input type="password" name="password">

                    <input type="submit" value="Ingresar">
                </form>
            </div>
        </aside>

        <!-- DIV PRINCIPAL -->
        <div id="principal">
            <h1>Ultimas entradas</h1>
            <article class="entrada">
                <a href="">
                    <h2>Titulo de mi entrada</h2>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Incidunt placeat tempora corrupti,
                        quos tenetur nostrum reprehenderit cupiditate aliquid eveniet sed.
                    </p>
                </a>
            </article>

            <article class="entrada">
                <a href="">
                    <h2>Titulo de mi entrada</h2>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Incidunt placeat tempora corrupti,
                        quos tenetur nostrum reprehenderit cupiditate aliquid eveniet sed.
                    </p>
                </a>
            </article>

            <article class="entrada">
            <a href="">
                    <h2>Titulo de mi entrada</h2>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Incidunt placeat tempora corrupti,
                        quos tenetur nostrum reprehenderit cupiditate aliquid eveniet sed.
                    </p>
                </a>
            </article>

            <article class="entrada">
            <a href="">
                    <h2>Titulo de mi entrada</h2>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Incidunt placeat tempora corrupti,
                        quos tenetur nostrum reprehenderit cupiditate aliquid eveniet sed.
                    </p>
                </a>
            </article>
            <div id="ver-todas">
                <a href="">Ver todas las entradas</a>
            </div>
        </div>  <!-- FIN DIV PRINCIPAL -->

        <div class="clearfix"></div>
    </div>

    <!-- PIE DE PÁGINA -->
    <footer id="pie">
        <p>
            Desarrollado por Figueroa José 2023
        </p>
    </footer>
</body>
</html>