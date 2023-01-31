<?php
/**
 * @author Unai Díez Reguera, https://github.com/AlphaUnai
 * @see Model.php
 */
include_once 'Model.php';
  /**
   * Clase JuegosDB
   * La clase  JuegosDB  sirve para que los controladores la usen para acceder a la base de datos
   * hereda de Model.php
   */

class JuegosDB extends Model {
    /**
     * Función __construct
     * hereda del constructor de Model
     * Crea un objeto JuegosDB
     * @see Model::__construct
     */
    public function __construct(){//constructor
        parent::__construct("juegos");      
    }
    /**
     * Función getImg
     * Recoge un Juego de la base de datos
     * @param string $gameName nombre del juego 
     * @return array $res devuelve el juego con todos sus datos
     */
    public function getImg($gameName){
        $sql = 'SELECT * FROM ' . $this->tabla;
        $res = $this->db->results($sql);
        return $res;
    }
}
?>