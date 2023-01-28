<?php 
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

        if(isset($_GET['user'])){
            
            $user= ($log->getOne1('user',$_GET['user']));
            if(!$user){
                print_r($user);
                if(md5($_GET['pass2'])==md5($_GET['pass1'])){
                    $log = new LoginDB();
                    $log->newUser($_GET['user'], md5($_GET['pass1']));
                    header("Location: ../Vista/login.php", TRUE);
                   
                    
                }else{
                    $_SESSION['ERROR'] = "Las contraseñas no coinciden";  
                }
                
            }else{
                $_SESSION['ERROR'] = "Este usuario ya está registrado";  
            }
            
        }else{
            
            header("Location: ../Controlador/papure.php", TRUE);
            header("Location: ../Vista/register.php", TRUE);
        }
        
        
    }
    public function setURL(){
        if (!isset($this->urlini))
            $this->urlini = dirname($_SERVER['HTTP_REFERER']);
    }

}
$regControl = new regControl();
$regControl->login();
?>