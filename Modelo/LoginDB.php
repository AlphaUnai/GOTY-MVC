<?php
include_once 'Model.php';
class LoginDB extends Model {

    public function __construct(){//constructor
        parent::__construct("login");      
    }

    public function newUser($user,$pass){//nuevo usuario
        $sql="INSERT INTO login VALUES('$user','$pass',0)";
        $this->db->changes($sql);    
    }

    public function votado($user){//update del voto
        $sql = "UPDATE login SET votado=1 WHERE user='$user'";
        $this->db->changes($sql);
    }
}
?>