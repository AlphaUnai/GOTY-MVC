<?php
/**
 *  * @author Unai Díez Reguera, https://github.com/AlphaUnai
 */
session_start();//session start
session_destroy();//destruyo sesiones
header("Location: ./../Vista/login.php")//redirijo a Login
?>