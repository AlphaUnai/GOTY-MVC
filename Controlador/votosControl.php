<link rel="stylesheet" href="css/style1.css">
<?php 
/**
 * @see LoginDB.php
 * @see JuegosDB.php
 * @see nomsDB.php
 * @see votos.php
 */
require dirname(__FILE__).'/../Modelo/LoginDB.php';
require dirname(__FILE__).'/../Modelo/JuegosDB.php';
require dirname(__FILE__).'/../Modelo/nomsDB.php';
require dirname(__FILE__).'/../Vista/votos.php';
/**
 * Clase votosControl
 * Intermedia entre la base de datos y votos.php
 * @see votos.php
 */
class votosControl{
    /**
     * Función showNoms
     * Se encarga de controlar los datos que devuelve loginControl,
     * controla si ha votado o no el usuario y redirige a votos.php
     * con toda la información extraída de la base de datos
     * @return void
     */
    public function showNoms(){
        
        if(isset($_SESSION['user'])){
            $log = new LoginDB();//conecto a db
            $usr= ($log->getOne1('user',$_SESSION['user']));//recojo el usuario
          
            if($usr[2]==0){//si no ha votado el usuario
                $noms = new NomsDB();//conecto a db
                $catsbad= $noms->getCats();
                $arrJuegos=array();//creo dos arrays
                $cats=array();
                foreach($catsbad as $cat){
                    array_push($cats,$cat[0]);
                }  
                $data['cats'] = $cats;//lista de categorias
                foreach($cats as $idx){
                    array_push($arrJuegos, $noms->getGamesPerCat($idx));
                }
                $data['juegos'] = $arrJuegos;//lista de juegos
                $_SESSION['data'] = $data;
                //print_r(parse_url(basename($_SERVER['HTTP_REFERER'])));//otra que tampoco sirve para nada ya que solo printea una cosa
                if(isset($_SESSION['user'])&&basename($_SERVER['HTTP_REFERER'])=='Proyecto%20Final'){
                    header("Location:  ./Vista/votos.php");//redirijo
                }else if(isset($_SESSION['user'])&&basename($_SERVER['HTTP_REFERER'])!='Proyecto%20Final'){
                   // header("Location:  ./../Vista/votos.php");//redirijo
                }else{
                    header("Location:  ./Vista/login.php");//redirijo
                }
                //tanto If es para que no salte a vacio la función y no haga un redirect raro
            }
        }
    }

}
$votos = new votosControl();

$votos->showNoms();
?>