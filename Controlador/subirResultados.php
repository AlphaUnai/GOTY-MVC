<?php 
set_include_path('C:/xampp/htdocs/php/Proyecto Final/GOTY-MVC');
require_once ("Modelo/LoginDB.php");
require_once ("Modelo/nomsDB.php");

    session_start();
    
        if ($_SERVER['REQUEST_METHOD'] == 'GET') { //al hacer submit 

            //conecto a la BD
            $ndb = new NomsDB();
            $ldb = new LoginDB();

            $arrCat=$ndb->getCats();
           
            //print_r(count());
            foreach($arrCat as $key=>$val) {//actualizo los votos de cada categoría
                $res = $_GET[str_replace(" ", "_", $val[0])];
                $combi = explode("º", $res);
                $combi[0] = str_replace("_", " ", $combi[0]);
                $updated=$ndb->updateVotes($combi[0], $combi[1]);
            }
            $ldb->votado($_SESSION['user']);
    include_once("./../Vista/gracias.php");


        }
    if(isset($_SESSION['user'])){
    }        
    //header("Location: loginControl.php");
    
?>