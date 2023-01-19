<?php
include_once 'Model.php';
class NomsDB extends Model {
    public function __construct(){
        parent::__construct("noms");      
    }
    
    public function getGamesPerCat($cat){
        //echo ($cat);
        $sql='SELECT juego FROM `noms` WHERE nomCat="'.$cat.'"';
        if((array)$this->db){
            $this->db->conex('localhost', 'root', '', 'juegospremios');
        }
        $res = $this->db->results($sql);

        $this->db->cerrar();
        return $res;         
    }

    public function getCats(){
        
        $sql='SELECT DISTINCT nomCat FROM `noms`';
        $res = $this->db->results($sql);
        $this->db->cerrar();
        return $res;         
    }
}
?>