<?php
/**
 * @see db.php
 */
include_once 'db.php';
/**
 * Clase Model
 * La clase modelo hereda al resto sus métodos, sirve para obtener resultados de la base de datos
 */
class Model{
    /**
     * @access protected
     * @var string
     */
    protected $tabla;
    /**
     * @access protected
     * @var mixed
     */
    protected $db;
    /**
     * Función __construct
     * Crea un objeto Model
     * @param string $tabNom Nombre de la tabla
     */
    public function __construct($tabNom){//constructor
        $this->tabla = $tabNom;
        $this->db = new db();
        $this->db->conex('localhost', 'root', '', 'juegospremios');   
    }
    /**
     * Función getAll
     * Devuelve todos los registros de la tabla
     * @return array $res
     */
    public function getAll() {//obtener todos
        $sql = 'SELECT * FROM ' . $this->tabla;
        $res = $this->db->results($sql);
        return $res;
    }
    /**
     * Función getOne1
     * Devuelve un registro específico de la tabla
     * @param string $col nombre de la columna
     * @param string $value valor de la columna
     * @return array $res||$var
     */
    public function getOne1($col, $value){//obtener uno específico
        $sql='SELECT * FROM ' . $this->tabla .
             ' WHERE ' . $col . ' = "' . $value.'"';
        $res = $this->db->results($sql);
        if($res)
        return $res[0];
        else
        $var=array();
            return $var;             
    }
    /**
     * @deprecated
     * Summary of getOne2
     * Devuelve un par de valores
     * @param string $col1 columna 1
     * @param string $value1 valor de la columna 1
     * @param string $col2 columna 2
     * @param string $value2 valor de la columna 2
     * @return array $res
     */
    public function getOne2($col1, $value1, $col2, $value2){//obtener un par
        $sql='SELECT * FROM ' . $this->tabla .
             ' WHERE ' . $col1 . ' = "' . $value1.
             '" and '. $col2 . ' = "' . $value2.'"';
        $res = $this->db->results($sql);
        return $res[0];         
    }
    
    

}


?>