<?php
include_once 'Model.php';
class JuegosDB extends Model {
    public function __construct(){
        parent::__construct("juegos");      
    }
}
?>