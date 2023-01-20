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
                if(isset($data)){
                    $i=0; 
                    foreach ($data['cats'] as $cats){  
                            $f=0;
                            $cats2 = str_replace(" ", "_", $cats);
                            echo ("<div class='container'><h1 class='titulos'>$cats</h1><ul>");
                            while($f<=4){
                                $juego = $data['juegos'][$i][$f];   
                                $str = '<input type="radio" value="' . $cats2 . 'º' . $juego[0] . '" id="' . $i . '-' . $f . '" name=' . $cats2 . ' style="background:url(' . $juego[2] . ');background-size:cover;">';
                                echo ("<li>" . $str . "<br><label for='" . $i . "-" . $f . "'>$juego[0]<br></li>");
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