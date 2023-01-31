<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../css/style2.css">
    <title>Juegos premios 2022</title>

</head>
<body>


    <div class="container">
        <h1>Registrarse</h1>
        <form action="./../Controlador/regControl.php" method="get">
            <input type="text" name="user" id="user" spellcheck="false" placeholder="Usuario" required><br>
            <input type="password" name="pass1" id="pass1" placeholder="Contraseña" required><br>
            <input type="password" name="pass2" id="pass2" placeholder="Confirma contraseña" required><br>
            <input type="submit" name="submit" id="submit"><br>
        </form>
        <?php
        /**
         * @author Unai Díez Reguera, https://github.com/AlphaUnai
         */
        session_start();
            if(isset($_SESSION['ERROR'])){//si el error existe lo displayea
                echo ("<p>".$_SESSION['ERROR']."</p>");  
            }
             //Párrafo de errores
        ?>
    </div>  
</body>
</html>