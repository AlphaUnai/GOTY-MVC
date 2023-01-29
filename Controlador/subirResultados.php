<?php 
//los require de las bd
require dirname(__FILE__).'/../Modelo/loginDB.php';
require dirname(__FILE__).'/../Modelo/nomsDB.php';

    session_start();
    if(isset($_SESSION['user'])){
        if ($_SERVER['REQUEST_METHOD'] == 'GET') { //al hacer submit 

            //conecto a la BD
            $ndb = new NomsDB();
            $ldb = new LoginDB();

            $arrCat=$ndb->getCats();//obtengo las categorías

            foreach($arrCat as $key=>$val) {//actualizo los votos de cada categoría
                $res = $_GET[str_replace(" ", "_", $val[0])];
                $combi = explode("º", $res);
                $combi[0] = str_replace("_", " ", $combi[0]);
                $updated=$ndb->updateVotes($combi[0], $combi[1]);
            }
            $ldb->votado($_SESSION['user']);//updateo votado del usuario
            
            header("Location: ./../Vista/gracias.php");//redirijo


        }
    
    }
    header('Location: ../Vista/login.php', TRUE);//redirijo

   
    
?>