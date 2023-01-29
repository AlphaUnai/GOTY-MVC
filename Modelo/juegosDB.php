<?php
//incluye Model
include_once 'Model.php';
class JuegosDB extends Model {

    public function __construct(){//constructor
        parent::__construct("juegos");      
    }

    public function getImg($gameName){//obtiene todo de los juegos
        $sql = 'SELECT * FROM ' . $this->tabla;
        $res = $this->db->results($sql);
        return $res;
    }
}
?>