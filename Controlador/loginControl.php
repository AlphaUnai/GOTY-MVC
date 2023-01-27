<?php 
$dir=dirname($_SERVER['HTTP_REFERER']);
set_include_path("$dir/Proyecto Final/GOTY-MVC/");




class loginControl{
    private string $urlini;
    private bool $str=true;
    public function login(){
        if($this->str){
            $this->urlini=dirname($_SERVER['HTTP_REFERER']);
        }
        /**/session_start();
        require_once("./../Modelo/LoginDB.php");
        $log = new LoginDB();
        
        session_destroy();
        session_start();

        if(isset($_GET['user'])){
            
            $user= ($log->getOne1('user',$_GET['user']));
            //print_r($user);
            if($user){
                if($user[2]==1){
                    
                    header("Location: $this->urlini/gracias.php", TRUE);
                }else{
                    if($user[1]==md5($_GET['pass1'])){
                    
                        print_r(md5($_GET['pass1']));
                        echo ("<hr>");
                        print_r($user[1]);
                        $_SESSION['user']=$user[0];
                        $_SESSION['pass'][0] = md5($_GET['pass1']);
                        $_SESSION['pass'][1] = $user[1];
                        
                        header("Location: votosControl.php", TRUE);

                    }else{
                        $_SESSION['ERROR'] = "Contraseña incorrecta";
                        
                        header("Location: $this->urlini/login.php", TRUE);
                    }
                }
                
            }else{
                $_SESSION['ERROR'] = "Este usuario no está registrado";
                header("Location: $this->urlini/login.php", TRUE);
            }
        }else{
            header("Location: $this->urlini/papure.php", TRUE);
            header("Location: $this->urlini/login.php", TRUE);
        }
        
      // header("Location: $this->urlini/login.php", TRUE);
    }
    
}
$logControl = new loginControl();

$logControl->login();
?>