<?php 

/**
 * @author Unai Díez Reguera, https://github.com/AlphaUnai
 * @see LoginDB.php
 */
require dirname(__FILE__).'/../Modelo/LoginDB.php';//hago un requerimiento usando el dirname(__FILE__)
/**
   * Clase loginControl
   * La clase  loginControl  sirve para cargar datos a la vista login,
   * manipular la información que salga de esta,
   *  y redirigir a donde sea necesario
   * @see login.php
   */
class loginControl{
    /**
     * Función login
     * Es la función que controla todo lo que pase con la clase loginControl
     * Es un conjunto de condicionales que aseguran la redirección correcta
     * @return void
     */
    public function login(){
        $log = new LoginDB();//base de datos hacia el login
        session_start();
        $_SESSION['ERROR']="";// establezco el error a vacio

        if(isset($_GET['user'])){
            
            $user= ($log->getOne1('user',$_GET['user']));
            if($user){
                if($user[2]==1){// aunque sea inseguro, en el manual de usuario lo pondre:
                                // compruebo el nombre primero antes de las contraseñas para ahorrar ejecución
                                // asi que si el programa devuelve la página gracias aunque pongas una contraseña incorrecta,
                                // ese es el objetivo, no un error de programación
                    header("Location: ../Vista/gracias.php", TRUE);//
                }else{
                    $flag=12;
                    if($user[1]==md5($_GET['pass1'])){
                       
                        print_r(md5($_GET['pass1']));//estos molestan a los header y a veces hacen que dejen de funcionar
                        echo ("<hr>");// pero si los quito dejan de funcionar tambien
                        print_r($user[1]);
                        $_SESSION['user']=$user[0];//toda la info a los $_SESSION
                        $_SESSION['pass'][0] = md5($_GET['pass1']);
                        $_SESSION['pass'][1] = $user[1];
                        
                        header("Location: ../Controlador/votosControl.php", TRUE);//redirijo
                        $flag=11;
                    }
                    if($flag==12){
                        $_SESSION['ERROR'] = "Contraseña incorrecta";//misssmatching password
                        header("Location: ../Vista/login.php", TRUE);//redirijo
                    }
                    else{
                        header("Location: ../Controlador/votosControl.php", TRUE);//redirijo
                    }
   
                }
                
            }else{
                $_SESSION['ERROR'] = "Este usuario no está registrado";//user not found
                header("Location: ../Vista/login.php", TRUE);//redirijo
            }
        }else{
           
            if(pathinfo(dirname(__FILE__))['filename']=="Controlador"){
                // en un principio servía para cambiar la ruta en función de la carpeta en la que estaba
                // pero empezó a funcionar sin usarlo y me da miedo eliminarlo y que empiecen a fallar las rutas
                $head=dirname(__FILE__).'../Vista/login.php';
            }
            header('Location: ./Vista/login.php', TRUE);//redirijo
        }        
    } 
}
$logControl = new loginControl();

$logControl->login();
?>