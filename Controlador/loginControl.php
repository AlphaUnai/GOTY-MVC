<?php 
set_include_path('C:/xampp/htdocs/php/Proyecto Final/GOTY-MVC');
include_once ("Vista/Vista.php");
include_once ("Modelo/juegosDB.php");
include_once ("Modelo/LoginDB.php");
include_once ("Modelo/nomsDB.php");
include_once('votosControl.php');



class loginControl{
    private $urlini;
    public function login(){
        /**/session_start();
        $log = new LoginDB();
        
        session_destroy();
        session_start();

        if(isset($_GET['user'])){
            
            $user= ($log->getOne1('user',$_GET['user']));
            if($user){
                print_r($user);
                if($user[1]==md5($_GET['pass1'])){
                    
                    print_r(md5($_GET['pass1']));
                    echo ("<hr>");
                    print_r($user[1]);
                    $_SESSION['user']=$user[0];
                    $_SESSION['pass'][0] = md5($_GET['pass1']);
                    $_SESSION['pass'][1] = $user[1];
                    header("Location: $this->urlini/Proyecto%20Final/GOTY-MVC/Controlador/votosControl.php", TRUE);
                    exit();
                    
                }else{
                    $_SESSION['ERROR'] = "Contraseña incorrecta";
                    
                    
                }
            }else{
                $_SESSION['ERROR'] = "Este usuario no está registrado";
                
            }
        }else{
            header("Location:$this->urlini/Proyecto%20Final/GOTY-MVC/Controlador/papure.php", TRUE);
            header("Location: $this->urlini/Proyecto%20Final/GOTY-MVC/Vista/login.php", TRUE);
        }
        header("Location: $this->urlini/Proyecto%20Final/GOTY-MVC/Vista/login.php", TRUE);
    }
    public function setURL(){
        if (!isset($this->urlini))
            $this->urlini = dirname($_SERVER['HTTP_REFERER']);
    }

}
$logControl = new loginControl();

$logControl->login();
?>