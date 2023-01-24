<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../css/style2.css">
    <title>Login</title>
</head>
<body>

<?php
        session_start();//session start
        $a = "";//variable para los errores
        
        if(isset($_SESSION['user'])){
           
        }else{
            
        }
    ?>



    <div class="container">
    <h1>Login</h1>
    <form action="./../Controlador/loginControl.php" method="get">
        <input type="text" name="user" id="user" spellcheck="false" placeholder="Usuario" required><br>
        <input type="password" name="pass1" id="pass1" placeholder="Contraseña" required><br>
        <input type="submit" name="submit" id="submit" value="Entrar"><br>
        <a href="Register.php"><input type="button" value="Registrarse"></a><br>
       

    </form>
    <?php 
    if(isset($_SESSION['ERROR'])){
        echo ("<p>" . $_SESSION['ERROR'] . "</p>");
    } 
    ?>
    </div>    
        
       
    
    
</body>
</html>