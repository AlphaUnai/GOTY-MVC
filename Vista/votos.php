<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../css/style1.css">
    
</head>
<body></body>
    
    <form action="./../Controlador\subirResultados.php" method="GET">

        <?php
        /**
         * @author Unai Díez Reguera, https://github.com/AlphaUnai
         */

        session_start();
        
                if(isset($_SESSION['data'])){
                    $data = $_SESSION['data'];//obtiene los juegos de la sesion
                    echo ("<header class='header1'>");//cabecera de la página de votaciones
                    echo ("<a href='./../Controlador/Logoff.php' class='logoff'></a><br>");//contenido html
                    echo ("<h1 class='head'>Juegos Premios 2022</h1>");
                    echo ("<a href='' class='awards'></a>");
                    echo ("</header>");
                    $i=0;//flag
                    foreach ($data['cats'] as $cats){  //por cada categoria 
                            $f=0;//flag
                            $cats2 = str_replace(" ", "_", $cats);
                            echo ("<div class='container'><h1 class='titulos'>$cats</h1><ul>");
                            while($f<=4){//display 5 juegos
                                $juego = $data['juegos'][$i][$f];
                                $str = '<input type="radio" value="' . $cats2 . 'º' . $juego[0] . '" id="' . $i . '-' . $f . '" name=' . $cats2 . ' style="background:url(' . $juego[2] . ');background-size:cover;">';
                                echo ("<li>" . $str . "<br><label for='" . $i . "-" . $f . "'>$juego[1]<br></li>");//el input tiene todos los datos
                                $f++;    
                            }
                            echo ("<br>");
                            echo ("</ul></div>");
                            $i++;
                        

                    }
                    echo ("<input type='submit' value='Votar'>");
                    
                }
        ?>
    </form>
   
    
</body>
</html>