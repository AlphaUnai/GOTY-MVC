<?php
include_once 'Model.php';
class JuegosDB extends Model {
    public function __construct(){
        parent::__construct("juegos");      
    }

    public function getImg($gameName) {
        $sql = 'SELECT * FROM ' . $this->tabla;
        $res = $this->db->results($sql);
        
        return $res;
    }
}
?>