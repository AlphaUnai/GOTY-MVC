<link rel="stylesheet" href="css/style1.css">
<?php 
set_include_path('C:/xampp/htdocs/php/Proyecto Final/GOTY-MVC');
include_once ("Vista/Vista.php");
include_once ("Modelo/juegosDB.php");
include_once ("Modelo/LoginDB.php");
include_once ("Modelo/nomsDB.php");

class votosControl{
    public function showNoms(){
        session_start();
        $log = new LoginDB();
        $usr= ($log->getOne1('user',$_GET['user']));
        print_r($usr);
        if($usr[2]==0){
            $noms = new NomsDB();
            $catsbad= $noms->getCats();
            $arrJuegos=array();
            $cats=array();
            foreach($catsbad as $cat){
                array_push($cats,$cat[0]);
            }  
            $data['cats'] = $cats;
            foreach($cats as $idx){
                array_push($arrJuegos, $noms->getGamesPerCat($idx));
            }
            $data['juegos'] = $arrJuegos;
            $_SESSION['data'] = $data;
            print_r(parse_url(basename($_SERVER['HTTP_REFERER'])));
            if(isset($_SESSION['user'])&&basename($_SERVER['HTTP_REFERER'])=='Proyecto%20Final'){
                header("Location:  ./Vista/votos.php");
            }else if(isset($_SESSION['user'])&&basename($_SERVER['HTTP_REFERER'])!='Proyecto%20Final'){
                header("Location:  ./../Vista/votos.php");
            }else{
                header("Location:  ./Vista/login.php");
            }
    
        }
    }

}
$votos = new votosControl();

$votos->showNoms();
?>