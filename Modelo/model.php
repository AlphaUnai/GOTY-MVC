<?php
include_once 'db.php';
class Model{
    protected $tabla;
    protected $db;

    public function __construct($tabNom){
        $this->tabla = $tabNom;
        $this->db = new db();
        $this->db->conex('localhost', 'root', '', 'juegospremios');
        
    }
    public function getAll() {
        $sql = 'SELECT * FROM ' . $this->tabla;
        $res = $this->db->results($sql);
        return $res;
    }

    public function getOne1($col, $value){
        $sql='SELECT * FROM ' . $this->tabla .
             ' WHERE ' . $col . ' = "' . $value.'"';
        $res = $this->db->results($sql);
        if($res)
        return $res[0];
                 
    }

    public function getOne2($col1, $value1, $col2, $value2){
        $sql='SELECT * FROM ' . $this->tabla .
             ' WHERE ' . $col1 . ' = "' . $value1.
             '" and '. $col2 . ' = "' . $value2.'"';
        $res = $this->db->results($sql);
        
        return $res[0];         
    }
    
    

}


?>