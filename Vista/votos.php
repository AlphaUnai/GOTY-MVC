<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../css/style1.css">
    
</head>
<body></body>
    
    <form action="Controlador\loginControl.php" method="GET">

        <?php

        session_start();
        //print_r($_SESSION['data']);
                if(isset($_SESSION['data'])){
                    $data = $_SESSION['data'];
                    echo ("<header class='header1'>");//cabecera de la página de votaciones
                    echo ("<a href='./../Controlador/Logoff.php' class='logoff'></a><br>");
                    echo ("<h1 class='head'>Juegos Premios 2022</h1>");
                    echo ("<a href='' class='awards'></a>");
                    echo ("</header>");
                    $i=0; 
                    foreach ($data['cats'] as $cats){  
                            $f=0;
                            $cats2 = str_replace(" ", "_", $cats);
                            echo ("<div class='container'><h1 class='titulos'>$cats</h1><ul>");
                            while($f<=4){
                                $juego = $data['juegos'][$i][$f];
                                $str = '<input type="radio" value="' . $cats2 . 'º' . $juego[0] . '" id="' . $i . '-' . $f . '" name=' . $cats2 . ' style="background:url(' . $juego[2] . ');background-size:cover;">';
                                echo ("<li>" . $str . "<br><label for='" . $i . "-" . $f . "'>$juego[1]<br></li>");
                                $f++;    
                            }
                            echo ("<br>");
                            echo ("</ul></div>");
                            $i++;
                        

                    }
                    echo ("<input type='submit' value='Votar'>");
                    echo ("<input type='submit' value='".$_SESSION['pass'][1]."-".$_SESSION['pass'][0]."'>");
                }
        ?>
    </form>
   
    
</body>
</html>