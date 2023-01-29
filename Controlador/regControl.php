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
        //tampoco debería funcionar con las session
        // en caso de que no funcione, descomente esto:
        // session_destroy();
        // session_start();
        $user= ($log->getOne1('user',$_GET['user']));//get user by name, para comprobar si existe
        if(!$user){
            if(md5($_GET['pass2'])==md5($_GET['pass1'])){
                $log = new LoginDB();//base de datos
                $log->newUser($_GET['user'], md5($_GET['pass1']));//inserta un nuevo usuario con los datos de registro
                $_SESSION['ERROR']="";//mensaje de error vacio
                header("Location: ../Vista/login.php", TRUE);   //redirijo  
            }else{
                $_SESSION['ERROR'] = "Las contraseñas no coinciden"; //mensaje de error
                header("Location: ../Vista/register.php", TRUE);  //redirijo
            }  
        }else{
            $_SESSION['ERROR'] = "Este usuario ya está registrado";  //mensaje de error
            header("Location: ../Vista/register.php", TRUE);  //redirijo
        }   
    }
}
$regControl = new regControl();
$regControl->login();
?>