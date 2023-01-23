<?php 
set_include_path('C:/xampp/htdocs/php/Proyecto Final/GOTY-MVC');
include_once ("Vista/Vista.php");
include_once ("Modelo/juegosDB.php");
include_once ("Modelo/LoginDB.php");
include_once ("Modelo/nomsDB.php");
include_once('votosControl.php');



class loginControl{
    public function login(){
        $log = new LoginDB();
        if(isset($_GET['user'])){
            $user= ($log->getOne1('user',$_GET['user']));
            print_r($user);
            if($user){
                print_r($user);
                if($user[1]==md5($_GET['pass1'])){
                    
                    
                    $_SESSION['user']=$user[0];
                   
                    header("Location: votosControl.php", TRUE);
                    exit();
                }else{
                    echo ("<hr>");
                    echo ($user[1]."-/-");
                    echo (md5($_GET['pass1']));
                }
            }
        }else{
            Vista::show("login");      
        }
        
        
        
    }
    public function showNoms(){
        
    }

}
$logControl = new loginControl();

$logControl->login();
?>