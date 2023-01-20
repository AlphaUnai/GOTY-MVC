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
                        while($i<count($data['cats'])){
                            $f=0;
                            while($f<=4){
                                print_r("<li>".$data['juegos'][$i][$f]."</li>");
                                $f++;
                            }
                            $i++;
                        }

                    }
                }
        ?>
    </form>
   
    
</body>
</html>