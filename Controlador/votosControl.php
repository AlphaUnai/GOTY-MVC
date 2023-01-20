<?php 
include ("./Vista/Vista.php");
include ("./Modelo/juegosDB.php");
include ("./Modelo/LoginDB.php");
include ("./Modelo/nomsDB.php");

class votosControl{
    public function showNoms(){
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
        
        Vista::show("votos", $data);
    }

}
?>