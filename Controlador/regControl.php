<?php 
//los require de uso en la entrega bien comentada aparecerán documentados
require dirname(__FILE__).'/../Modelo/LoginDB.php';
require dirname(__FILE__).'/../Modelo/JuegosDB.php';
require dirname(__FILE__).'/../Modelo/nomsDB.php';




class regControl{
    private $urlini;
    public function login(){
        /**/session_start();
        $log = new LoginDB();        
        session_destroy();
        session_start();
        $_SESSION['pog']="if";
        $user= ($log->getOne1('user',$_GET['user']));
        if(!$user){
            if(md5($_GET['pass2'])==md5($_GET['pass1'])){
                $log = new LoginDB();
                $log->newUser($_GET['user'], md5($_GET['pass1']));
                $_SESSION['ERROR']="";
                header("Location: ../Vista/login.php", TRUE);     
            }else{
                $_SESSION['ERROR'] = "Las contraseñas no coinciden";
                header("Location: ../Vista/register.php", TRUE);  
            }  
        }else{
            $_SESSION['ERROR'] = "Este usuario ya está registrado";  
            header("Location: ../Vista/register.php", TRUE);  
        }   
    }
}
$regControl = new regControl();
$regControl->login();
?>