<?php 
include ("./Vista/Vista.php");
include ("./Modelo/juegosDB.php");
include ("./Modelo/LoginDB.php");
include ("./Modelo/nomsDB.php");

class votosControl{
    public function showNoms(){
        $noms = new NomsDB();
        $cats= $noms->getCats();
        $arrJuegos=array();
        $data['cats'] = $cats;
        foreach($cats as $idx){
            //echo ($idx);
            array_push($arrJuegos, $noms->getGamesPerCat($idx));
        }
        $data['juegos'] = $arrJuegos;
        //print_r($data['juegos']);
        Vista::show("votos", $data);
    }

}
?>