<?php
include_once 'Model.php';
class NomsDB extends Model {
    public function __construct(){
        parent::__construct("noms");      
    }
    
    public function getGamesPerCat($cat){
        //echo ($cat);
        $sql='SELECT n.juego, j.nombre, j.url  FROM noms n join juegos j on n.juego=j.codJuego WHERE nomCat="'.$cat.'"';
        if((array)$this->db){
            $this->db->conex('localhost', 'root', '', 'juegospremios');
        }
        $res = $this->db->results($sql);
        //print_r($res);

        return $res;         
    }

    public function getCats(){
        
        $sql='SELECT DISTINCT nomCat FROM `noms`';
        $res = $this->db->results($sql);
        return $res;         
    }

    public function updateVotes($category,$game){
        $sql="update noms set votos= ((select votos from noms where((juego='$game')and(nomCat='$category')))+1) where ((juego='$game')and(nomCat='$category'));        ";
        $res = $this->db->changes($sql);
        
        return $res;         
    }
}
?>