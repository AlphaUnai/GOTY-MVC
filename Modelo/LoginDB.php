<?php
include_once 'Model.php';
class LoginDB extends Model {
    public function __construct(){
        parent::__construct("login");      
    }

    public function newUser($user,$pass){
        $sql="INSERT INTO login VALUES('$user','$pass',0)";
        $this->db->changes($sql);    
    }

    public function votado($user){
        $sql = "UPDATE login SET votado=1 WHERE user='$user'";
        $this->db->changes($sql);
    }
}
?>