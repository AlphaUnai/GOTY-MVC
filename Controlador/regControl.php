<?php 
set_include_path('C:/xampp/htdocs/php/Proyecto Final/GOTY-MVC');

require_once ("Modelo/juegosDB.php");
require_once ("Modelo/LoginDB.php");
require_once ("Modelo/nomsDB.php");




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
                    header("Location: $this->urlini/PHP/Proyecto%20Final/GOTY-MVC/Vista/login.php", TRUE);
                   
                    
                }else{
                    $_SESSION['ERROR'] = "Las contraseñas no coinciden";  
                }
                
            }else{
                $_SESSION['ERROR'] = "Este usuario ya está registrado";  
            }
            
        }else{
            
            header("Location:$this->urlini/PHP/Proyecto%20Final/GOTY-MVC/Controlador/papure.php", TRUE);
            header("Location: $this->urlini/PHP/Proyecto%20Final/GOTY-MVC/Vista/register.php", TRUE);
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