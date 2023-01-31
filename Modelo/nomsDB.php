<?php
/**
 * @author Unai Díez Reguera, https://github.com/AlphaUnai
 * @see Model.php
 */
include_once 'Model.php';
/**
   * Clase NomsDB
   * La clase  NomsDB  sirve para que los controladores la usen para acceder a la base de datos
   * hereda de Model.php
   */
class NomsDB extends Model {
    /**
     * Función __construct
     * hereda del constructor de Model
     * Crea un objeto Noms
     * @see Model::__construct
     */
    public function __construct(){
        parent::__construct("noms");// 
    }
    /**
     * Función getGamesPerCat
     * Devuelve los Juegos por categiría
     * @param string $cat categoría de nominación
     * @return array $res array de juegos de $cat
     */
    public function getGamesPerCat($cat){//obtiene los nominados
        $sql='SELECT n.juego, j.nombre, j.url  FROM noms n join juegos j on n.juego=j.codJuego WHERE nomCat="'.$cat.'"';
        if((array)$this->db){
            $this->db->conex('localhost', 'root', '', 'juegospremios');
        }
        $res = $this->db->results($sql);
        return $res;         
    }
    /**
     * Función getCats
     * Obtiene las categorías de nominación
     * @return array $res 
     */
    public function getCats(){//obtiene categorias
        $sql='SELECT DISTINCT nomCat FROM `noms`';
        $res = $this->db->results($sql);
        return $res;         
    }
    /**
     * Función updateVotes
     * Suma uno a los votos del juego seleccionado en la categoría
     * @param string $category nombre la categoría
     * @param string $game nombre del juego
     * @return int $res lineas afectadas
     */
    public function updateVotes($category,$game){
        $sql="update noms set votos= ((select votos from noms where((juego='$game')and(nomCat='$category')))+1) where ((juego='$game')and(nomCat='$category'));        ";
        $res = $this->db->changes($sql);
        return $res;         
    }
}
?>