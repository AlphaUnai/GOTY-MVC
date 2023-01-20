<?php
/**
 * Clase db
 * su uso es el exclusivo de conexión y cierre
 * a la base de datos, así como sus funciones result y changes
 * que se usan en otros documentos
 */
class db{
    
    /**
     * La variable de la base de datos db
     * @var mixed
     */
    protected $db;

    /**
     * Función de iniciar conexión
     * Conecta a la base de datos a través de un PDO
     * @param string $server
     * @param string $user
     * @param string $password
     * @param string $dbname
     * @return int
     */
    function conex($server, $user, $password,$dbname){
        $str = 'mysql:host=' . $server . ';dbname=' . $dbname;
        $this->db = new PDO($str,$user,$password);
        if ($this->db->errorCode() != null){
            return -1;
        }        
        else{
            return 0;          
        }       
    }
    
    /**
     * Función de cerrar conexión
     * Cierra la conexión
     * @return void
     */
    function cerrar(){
        if($this->db) $this->db=null;
    }

    /**
     * Función results 
     * Obtiene los registros de la consulta 
     * @param string $sql 
     * Consulta SQL
     * @return array
     * Devuelve todos los resultados de la consulta
     * en un array
     */
    function results($sql){
        //print_r($this->db);
        $result=$this->db->query($sql);
        $arrRes = array();
        while($row=$result->fetch(PDO::FETCH_NUM)){
            array_push($arrRes, $row);
            /*print_r($row);
            echo ("<HR>");*/
        }
        return $arrRes;
    }

    /**
     * Función changes
     * Obtiene las filas afectadas por la consulta sql
     * @param string $sql 
     * Consulta SQL
     * @return int
     * Devuelve filas afectadasS
     */
    function changes($sql){
        $changed=$this->db->query($sql);
        return $changed->rowCount();
    }
}

?>