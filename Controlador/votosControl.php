<link rel="stylesheet" href="css/style1.css">
<?php 

require dirname(__FILE__).'/../Modelo/LoginDB.php';
require dirname(__FILE__).'/../Modelo/JuegosDB.php';
require dirname(__FILE__).'/../Modelo/nomsDB.php';
require dirname(__FILE__).'/../Vista/votos.php';

class votosControl{
    public function showNoms(){
        session_start();
        if(isset($_SESSION['user'])){
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

}
$votos = new votosControl();

$votos->showNoms();
?>