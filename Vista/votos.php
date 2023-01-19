<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style1.css">
    
</head>
<body>
    
    <form action="logica.php" method="GET">

        <?php
                session_start();//session start
                $pdo=new PDO('mysql:host=localhost;dbname=juegospremios','root','');//conecto a la BD

                if(!isset($_SESSION['user'])){

                    echo("<header class='header2'>");
                    echo ("<h1 class='head2'>        Inicia sesión para ver las votaciones</h1>");
                    echo ("<a href='Login.php' class='login'></a>");
                    echo("</header>");

                }else{
                    $sqlvotado=('SELECT votado FROM login WHERE user="'.$_SESSION['user'].'"');
                    $row = $pdo->query($sqlvotado)->fetchAll();
                    $pablo = $row[0][0];
                    if($pablo!=0){
                        

                        echo ("<header class='header2'>");//cabecera que indica que ya has votado
                        echo ("<a href='Logoff.php' class='login'></a><br>");
                        echo ("<h1 class='head2'>¡Gracias por votar!</h1>");
                        

                    } else {

                        echo ("<header class='header1'>");//cabecera de la página de votaciones

                        echo ("<a href='Logoff.php' class='logoff'></a><br>");
                        echo ("<h1 class='head'>Juegos Premios 2022</h1>");
                        echo ("<a href='' class='awards'></a>");
                        echo ("</header>");

                        //conecto a la BD
                        $sqlCats = ('SELECT distinct nomCat FROM noms');
                        $pdo = new PDO('mysql:host=localhost;dbname=juegospremios', 'root', '');//conecto a la BD
                        $result = $pdo->query($sqlCats);
                        $row = $result->fetchAll();//recojo datos

                        $flag = 0;//var temp para poner id a los inputs

                        foreach ($row as $row => $val) {//por cada resultado
                            $nomcat = $val[0];//guardo el nombre de la categoria en la variable nomCat

                            //conecto a la BD
                            $pdo2 = new PDO('mysql:host=localhost;dbname=juegospremios', 'root', '');//conecto a la BD
                            $sqljuegos = ('SELECT j.nombre ,j.url ,n.juego FROM noms n join juegos j on j.codJuego=n.juego WHERE n.nomCat="' . $nomcat . '"');
                            $result2 = $pdo2->query($sqljuegos);
                            $row2 = $result2->fetchAll();//recojo los resultados

                            $nomcat2 = str_replace(" ", "_", $nomcat);//cambio los espacios por _ para que al usarlo después en el input me recoja todo el nombre
                            echo ("<div class='container'><h1 class='titulos'>$nomcat</h1><ul>");
                            $flag2 = 0;//var temp para poner id

                            foreach ($row2 as $row2 => $val2) {//por cada resultado

                                $str = '<input type="radio" value="' . $nomcat . 'º' . $val2[2] . '" id="' . $flag . '-' . $flag2 . '" name=' . $nomcat2 . ' style="background:url(' . $val2[1] . ');background-size:cover;">';//value es CategoriaºJuego, id es 0-0,0-1,0-2, etc. por cada iteración del foreach, name es la categoría y el background es la imagen sacada de la base de datos (url)
                                echo ("<li>" . $str . "<br><label for='" . $flag . "-" . $flag2 . "'>$val2[0]<br></li>");//label con el nombre del juego ligado a la id del input de este
                                $flag2++;//+1 flag2

                            }

                            echo ("<br>");
                            echo ("</ul></div>");
                            $flag++;//+1 flag
                        }
                        
                        echo ("<input type='submit' value='Votar'>");
                    }
                }
        ?>
    </form>
   
    
</body>
</html>