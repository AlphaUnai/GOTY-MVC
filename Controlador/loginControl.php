<?php 


require dirname(__FILE__).'/../Modelo/LoginDB.php';

class loginControl{
    public function login(){
        
       
        $log = new LoginDB(); 
        session_start();
        

        if(isset($_GET['user'])){
            
            $user= ($log->getOne1('user',$_GET['user']));
            //print_r($user);
            if($user){
                if($user[2]==1){
                    
                    header("Location: ../Vista/gracias.php", TRUE);
                }else{
                    $flag=12;
                    if($user[1]==md5($_GET['pass1'])){
                       
                        print_r(md5($_GET['pass1']));
                        echo ("<hr>");
                        print_r($user[1]);
                        $_SESSION['user']=$user[0];
                        $_SESSION['pass'][0] = md5($_GET['pass1']);
                        $_SESSION['pass'][1] = $user[1];
                        
                        header("Location: ../Controlador/votosControl.php", TRUE);
                        $flag=11;
                    }
                    if($flag==12){$_SESSION['ERROR'] = "Contraseña incorrecta";
                    header("Location: ../Vista/login.php", TRUE);}
                    else{
                        header("Location: ../Controlador/votosControl.php", TRUE);
                    }
                    
                    
                }
                
            }else{
                $_SESSION['ERROR'] = "Este usuario no está registrado";
                header("Location: ../Vista/login.php", TRUE);
            }
        }else{
           
            if(pathinfo(dirname(__FILE__))['filename']=="Controlador"){
                $head=dirname(__FILE__).'../Vista/login.php';
            }
            header('Location: ./Vista/login.php', TRUE);
        }        
        
        
       
    }
    
}
$logControl = new loginControl();

$logControl->login();
?>