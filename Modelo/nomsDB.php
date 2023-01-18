<?php
include_once 'Model.php';
class NomsDB extends Model {
    public function __construct(){
        parent::__construct("noms");      
    }
}
?>