<?php
include_once 'Model.php';
class LoginDB extends Model {
    public function __construct(){
        parent::__construct("login");      
    }
}
?>